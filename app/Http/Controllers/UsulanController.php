<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\CatatanVerifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsulanController extends Controller
{
    /**
     * Tampilkan daftar semua usulan verifikasi.
     * Bisa difilter berdasarkan status atau dicari berdasarkan nama siswa / pengusul.
     */
    public function index(Request $request)
    {
        $query = CatatanVerifikasi::with('siswa')->latest();

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan jenis (prestasi / pelanggaran)
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // Filter berdasarkan rentang tanggal jika ada
        if ($request->filled('tanggal_dari')) {
            $query->whereDate('created_at', '>=', $request->tanggal_dari);
        }
        if ($request->filled('tanggal_sampai')) {
            $query->whereDate('created_at', '<=', $request->tanggal_sampai);
        }

        // Pencarian berdasarkan nama siswa, NIS, kelas, nama pengusul, atau keterangan
        if ($request->filled('search')) {
            $keyword = trim($request->search);
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_pencatat', 'like', "%{$keyword}%")
                  ->orWhere('keterangan', 'like', "%{$keyword}%")
                  ->orWhere('nis', 'like', "%{$keyword}%")
                  ->orWhereHas('siswa', function ($sq) use ($keyword) {
                      $sq->where('nama_lengkap', 'like', "%{$keyword}%")
                         ->orWhere('nis', 'like', "%{$keyword}%")
                         ->orWhere('kelas', 'like', "%{$keyword}%");
                  });
            });
        }

        // Salin query untuk kebutuhan cetak (seluruh data hasil filter)
        $queryPrint = clone $query;
        $usulansPrint = $queryPrint->get();

        $usulans  = $query->paginate(15)->withQueryString();
        $siswas   = Siswa::orderBy('nama_lengkap')->get(['nis', 'nama_lengkap', 'kelas']);

        // Statistik ringkasan
        $stats = [
            'total'     => CatatanVerifikasi::count(),
            'menunggu'  => CatatanVerifikasi::where('status', 'menunggu')->count(),
            'disetujui' => CatatanVerifikasi::where('status', 'disetujui')->count(),
            'ditolak'   => CatatanVerifikasi::where('status', 'ditolak')->count(),
        ];

        return view('usulan_verifikasi', compact('usulans', 'usulansPrint', 'siswas', 'stats'));
    }

    /**
     * Simpan usulan baru dari guru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'            => 'required|exists:siswa,nis',
            'nama_pengusul'  => 'required|string|max:100',
            'jenis'          => 'required|in:prestasi,pelanggaran',
            'poin'           => 'required|integer|min:1|max:500',
            'keterangan'     => 'required|string|max:500',
        ]);

        CatatanVerifikasi::create([
            'nis'             => $request->nis,
            'nama_pencatat'   => $request->nama_pengusul,
            'jenis'           => $request->jenis,
            'nilai_poin'      => $request->poin,
            'tanggal_catatan' => now()->toDateString(),
            'kategori'        => ucfirst($request->jenis),
            'keterangan'      => $request->keterangan,
            'status'          => 'menunggu',
        ]);

        return redirect()->route('usulan.verifikasi')
            ->with('success', 'Usulan berhasil dikirim dan menunggu verifikasi admin.');
    }

    /**
     * Proses verifikasi: setujui atau tolak usulan.
     * Jika disetujui, poin siswa diperbarui secara otomatis.
     */
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'aksi'               => 'required|in:disetujui,ditolak',
            'catatan_verifikasi' => 'nullable|string|max:300',
        ]);

        $usulan = CatatanVerifikasi::findOrFail($id);

        // Hanya bisa diproses jika masih "menunggu"
        if ($usulan->status !== 'menunggu') {
            return back()->with('error', 'Usulan ini sudah diproses sebelumnya.');
        }

        $usulan->update([
            'status'        => $request->aksi,
            'catatan_admin' => $request->catatan_verifikasi,
            'verified_at'   => Carbon::now(),
        ]);

        // Jika disetujui, update poin siswa secara otomatis
        if ($request->aksi === 'disetujui') {
            $siswa = Siswa::where('nis', $usulan->nis)->first();
            if ($siswa) {
                if ($usulan->jenis === 'prestasi') {
                    $siswa->tambahPrestasi($usulan->nilai_poin);
                } else {
                    $siswa->tambahPelanggaran($usulan->nilai_poin);
                }
            }
        }

        $pesan = $request->aksi === 'disetujui'
            ? 'Usulan disetujui dan poin siswa telah diperbarui.'
            : 'Usulan ditolak.';

        return redirect()->route('usulan.verifikasi')
            ->with('success', $pesan);
    }

    /**
     * Hapus usulan (hanya yang masih menunggu).
     */
    public function destroy($id)
    {
        $usulan = CatatanVerifikasi::findOrFail($id);

        if ($usulan->status !== 'menunggu') {
            return back()->with('error', 'Usulan yang sudah diproses tidak dapat dihapus.');
        }

        $usulan->delete();

        return redirect()->route('usulan.verifikasi')
            ->with('success', 'Usulan berhasil dihapus.');
    }
}

