<?php

namespace App\Http\Controllers;

use App\Models\CatatanVerifikasi;
use Illuminate\Http\Request;

class VerifikasiDashboardController extends Controller
{
    /**
     * Tampilkan Dashboard Verifikasi beserta statistik, chart, aktivitas,
     * dan tabel riwayat yang dapat difilter/dicari/dipaginate.
     */
    public function index(Request $request)
    {
        // ── Statistik ringkasan global ──
        $stats = [
            'total'       => CatatanVerifikasi::count(),
            'menunggu'    => CatatanVerifikasi::where('status', 'menunggu')->count(),
            'disetujui'   => CatatanVerifikasi::where('status', 'disetujui')->count(),
            'ditolak'     => CatatanVerifikasi::where('status', 'ditolak')->count(),
            'prestasi'    => CatatanVerifikasi::where('jenis', 'prestasi')->count(),
            'pelanggaran' => CatatanVerifikasi::where('jenis', 'pelanggaran')->count(),
        ];

        // ── Aktivitas terbaru (7 entri terakhir) ──
        $aktivitasTerbaru = CatatanVerifikasi::with('siswa')
            ->latest()
            ->take(7)
            ->get();

        // ── Tabel riwayat dengan filter & pagination ──
        $query = CatatanVerifikasi::with('siswa')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

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

        $riwayat = $query->paginate(15)->withQueryString();

        return view('dashboard_verifikasi', compact('stats', 'aktivitasTerbaru', 'riwayat'));
    }
}


