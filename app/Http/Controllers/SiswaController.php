<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class SiswaController extends Controller
{
    // Menampilkan daftar siswa
    public function index(Request $request)
    {
        if (auth('siswa')->check()) {
            $siswa = auth('siswa')->user();
            return redirect()->route('siswa.show', $siswa->nis);
        }

        $query = Siswa::query();

        // Pencarian
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%');
            });
        }

        // Filter kelas
        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        $siswas = $query->orderBy('nama_lengkap')->get();

        return view('siswa', compact('siswas'));
    }


    // Detail siswa
    public function show($nis)
    {
        if (auth('siswa')->check()) {
            $siswaLogin = auth('siswa')->user();
            if ($siswaLogin->nis != $nis) {
                return redirect()->route('siswa.show', $siswaLogin->nis)
                    ->with('error', 'Akses dibatasi: Anda hanya diizinkan melihat data pribadi Anda sendiri.');
            }
        }

        $siswa = Siswa::where('nis', $nis)->firstOrFail();

        $riwayatCatatan = \App\Models\CatatanVerifikasi::where('nis', $nis)
            ->latest()
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id'              => 'cv_' . $item->id,
                    'jenis'           => strtolower($item->jenis),
                    'kategori'        => $item->kategori ?: ucfirst($item->jenis),
                    'keterangan'      => $item->keterangan,
                    'nilai_poin'      => $item->nilai_poin,
                    'tanggal_catatan' => $item->tanggal_catatan ? \Illuminate\Support\Carbon::parse($item->tanggal_catatan)->format('Y-m-d') : ($item->created_at ? $item->created_at->format('Y-m-d') : date('Y-m-d')),
                    'nama_pencatat'   => $item->nama_pencatat ?: 'Petugas',
                    'status'          => $item->status,
                    'created_at'      => $item->created_at,
                ];
            });

        // Hitung total poin dari riwayat yang disetujui
        if ($riwayatCatatan->isNotEmpty()) {
            $totalPrestasiDisetujui = (int) $riwayatCatatan->where('jenis', 'prestasi')->where('status', 'disetujui')->sum('nilai_poin');
            $totalPelanggaranDisetujui = (int) $riwayatCatatan->where('jenis', 'pelanggaran')->where('status', 'disetujui')->sum('nilai_poin');

            $poinAwal = $siswa->poin_awal ?: 100;
            if ($siswa->poin_tambah !== $totalPrestasiDisetujui || $siswa->poin_kurang !== $totalPelanggaranDisetujui) {
                $siswa->poin_tambah = $totalPrestasiDisetujui;
                $siswa->poin_kurang = $totalPelanggaranDisetujui;
                $siswa->total_poin  = $poinAwal + $totalPrestasiDisetujui - $totalPelanggaranDisetujui;
                $siswa->save();
            }
        }

        return view('siswa_detail', compact('siswa', 'riwayatCatatan'));
    }


    // Simpan siswa baru
    public function store(Request $request)
    {
        if (auth('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama_lengkap' => 'required|max:255',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'poin_awal' => 100,
            'poin_kurang' => 0,
            'poin_tambah' => 0,
            'total_poin' => 100,
            'password' => Hash::make($request->password),
            'plain_password' => $request->password, // simpan password asli untuk ditampilkan di profil siswa
        ]);

        return redirect()->route('data.siswa')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }


    // EDIT / UPDATE DATA SISWA
    public function update(Request $request, $nis)
    {
        if (auth('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'password' => 'nullable|min:6',
        ]);

        $siswa = Siswa::where('nis', $nis)->firstOrFail();

        $updateData = [
            'nama_lengkap' => $request->nama_lengkap,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
            $updateData['plain_password'] = $request->password; // update password asli juga
        }

        $siswa->update($updateData);

        return redirect()->route('data.siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }


    // Update poin sikap
    public function updateSikap(Request $request)
    {
        if (auth('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'nis' => 'required|exists:siswa,nis',
            'jenis' => 'required|in:prestasi,pelanggaran',
            'poin' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->firstOrFail();

        $userRole = auth()->check() ? auth()->user()->role : 'admin';

        if ($userRole === 'guru') {
            // Guru: Status menunggu verifikasi admin, poin belum masuk
            \App\Models\CatatanVerifikasi::create([
                'nis'             => $siswa->nis,
                'nama_pencatat'   => auth()->user()->name,
                'jenis'           => $request->jenis,
                'nilai_poin'      => $request->poin,
                'tanggal_catatan' => now()->toDateString(),
                'kategori'        => ucfirst($request->jenis),
                'keterangan'      => $request->keterangan ?: (ucfirst($request->jenis) . ' ' . $siswa->nama_lengkap),
                'status'          => 'menunggu',
                'verified_at'     => null,
            ]);

            return back()->with('success', 'Catatan berhasil ditambahkan dan menunggu persetujuan admin.');
        } else {
            // Admin: Langsung disetujui dan poin bertambah
            if ($request->jenis == 'prestasi') {
                $siswa->tambahPrestasi($request->poin);
            } else {
                $siswa->tambahPelanggaran($request->poin);
            }

            \App\Models\CatatanVerifikasi::create([
                'nis'             => $siswa->nis,
                'nama_pencatat'   => auth()->check() ? auth()->user()->name : 'Petugas/Admin',
                'jenis'           => $request->jenis,
                'nilai_poin'      => $request->poin,
                'tanggal_catatan' => now()->toDateString(),
                'kategori'        => ucfirst($request->jenis),
                'keterangan'      => $request->keterangan ?: (ucfirst($request->jenis) . ' ' . $siswa->nama_lengkap),
                'status'          => 'disetujui',
                'verified_at'     => now(),
            ]);

            return back()->with('success', 'Catatan berhasil diperbarui.');
        }
    }


    // Cetak surat
    public function cetakSurat($nis)
    {
        if (auth('siswa')->check()) {
            $siswaLogin = auth('siswa')->user();
            if ($siswaLogin->nis != $nis) {
                return redirect()->route('siswa.show', $siswaLogin->nis)
                    ->with('error', 'Akses ditolak.');
            }
        }

        $siswa = Siswa::where('nis', $nis)->firstOrFail();

        $riwayatCatatan = \App\Models\CatatanVerifikasi::where('nis', $nis)
            ->latest()
            ->get()
            ->map(function ($item) {
                return (object) [
                    'jenis'           => strtolower($item->jenis),
                    'kategori'        => $item->kategori ?: ucfirst($item->jenis),
                    'keterangan'      => $item->keterangan,
                    'nilai_poin'      => $item->nilai_poin,
                    'tanggal_catatan' => $item->tanggal_catatan ? \Illuminate\Support\Carbon::parse($item->tanggal_catatan)->format('d/m/Y') : ($item->created_at ? $item->created_at->format('d/m/Y') : date('d/m/Y')),
                    'nama_pencatat'   => $item->nama_pencatat ?: 'Petugas',
                    'status'          => $item->status,
                ];
            });

        $pdf = Pdf::loadView('pdf.surat', compact('siswa', 'riwayatCatatan'));

        return $pdf->download('Surat_Poin_' . $siswa->nis . '.pdf');
    }


    // Hapus siswa
    public function destroy($nis)
    {
        if (auth('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akses ditolak.');
        }

        $siswa = Siswa::where('nis', $nis)->firstOrFail();

        $siswa->delete();

        return redirect()->route('data.siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}