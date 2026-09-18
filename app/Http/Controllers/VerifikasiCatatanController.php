<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\CatatanVerifikasi;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VerifikasiCatatanController extends Controller
{
    /**
     * Tampilkan halaman dashboard verifikasi catatan.
     * Menggabungkan data dari tabel catatan_verifikasi DAN tabel usulan.
     */
    public function index(Request $request)
    {
        $query = CatatanVerifikasi::with('siswa')->latest();

        // Filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter jenis
        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        // Search
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama_pencatat', 'like', "%{$keyword}%")
                  ->orWhere('kategori', 'like', "%{$keyword}%")
                  ->orWhere('keterangan', 'like', "%{$keyword}%")
                  ->orWhere('nis', 'like', "%{$keyword}%")
                  ->orWhereHas('siswa', function ($sq) use ($keyword) {
                      $sq->where('nama_lengkap', 'like', "%{$keyword}%")
                         ->orWhere('nis', 'like', "%{$keyword}%");
                  });
            });
        }

        $catatans = $query->paginate(15)->withQueryString();
        $siswas   = Siswa::orderBy('nama_lengkap')->get(['nis', 'nama_lengkap', 'kelas']);

        // Stats
        $stats = [
            'total'       => CatatanVerifikasi::count(),
            'menunggu'    => CatatanVerifikasi::where('status', 'menunggu')->count(),
            'disetujui'   => CatatanVerifikasi::where('status', 'disetujui')->count(),
            'ditolak'     => CatatanVerifikasi::where('status', 'ditolak')->count(),
            'prestasi'    => CatatanVerifikasi::where('jenis', 'prestasi')->count(),
            'pelanggaran' => CatatanVerifikasi::where('jenis', 'pelanggaran')->count(),
        ];

        return view('verifikasi_catatan', compact('catatans', 'siswas', 'stats'));
    }

    /**
     * Simpan catatan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'             => 'required|exists:siswa,nis',
            'nama_pencatat'   => 'required|string|max:100',
            'jenis'           => 'required|in:prestasi,pelanggaran',
            'nilai_poin'      => 'required|integer|min:1|max:500',
            'tanggal_catatan' => 'required|date',
            'kategori'        => 'nullable|string|max:100',
            'keterangan'      => 'required|string|max:500',
        ]);

        CatatanVerifikasi::create([
            'nis'             => $request->nis,
            'nama_pencatat'   => $request->nama_pencatat,
            'jenis'           => $request->jenis,
            'nilai_poin'      => $request->nilai_poin,
            'tanggal_catatan' => $request->tanggal_catatan,
            'kategori'        => $request->kategori,
            'keterangan'      => $request->keterangan,
            'status'          => 'menunggu',
        ]);

        return redirect()->route('verifikasi.catatan')
            ->with('success', 'Catatan berhasil ditambahkan dan menunggu verifikasi.');
    }

    /**
     * Proses verifikasi: setujui atau tolak.
     */
    public function proses(Request $request, $id)
    {
        $request->validate([
            'aksi'          => 'required|in:disetujui,ditolak',
            'catatan_admin' => 'nullable|string|max:300',
        ]);

        if ($request->aksi === 'ditolak') {
            $request->validate([
                'catatan_admin' => 'required|string|max:300',
            ], [
                'catatan_admin.required' => 'Alasan penolakan wajib diisi.',
            ]);
        }

        $catatan = CatatanVerifikasi::findOrFail($id);

        if ($catatan->status !== 'menunggu') {
            return back()->with('error', 'Catatan ini sudah diproses sebelumnya.');
        }

        $catatan->update([
            'status'        => $request->aksi,
            'catatan_admin' => $request->catatan_admin,
            'verified_at'   => Carbon::now(),
        ]);

        if ($request->aksi === 'disetujui') {
            $siswa = Siswa::where('nis', $catatan->nis)->first();
            if ($siswa) {
                if ($catatan->jenis === 'prestasi') {
                    $siswa->tambahPrestasi($catatan->nilai_poin);
                } else {
                    $siswa->tambahPelanggaran($catatan->nilai_poin);
                }
            }
        }

        $pesan = $request->aksi === 'disetujui'
            ? 'Catatan disetujui dan poin siswa telah diperbarui.'
            : 'Catatan ditolak.';

        return redirect()->route('verifikasi.catatan')->with('success', $pesan);
    }

    /**
     * Hapus catatan.
     */
    public function destroy(Request $request, $id)
    {
        $catatan = CatatanVerifikasi::findOrFail($id);

        if ($catatan->status !== 'menunggu') {
            return back()->with('error', 'Catatan yang sudah diproses tidak dapat dihapus.');
        }

        $catatan->delete();

        return redirect()->route('verifikasi.catatan')->with('success', 'Catatan berhasil dihapus.');
    }
}

