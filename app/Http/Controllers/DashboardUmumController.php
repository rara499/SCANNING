<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\CatatanVerifikasi;

class DashboardUmumController extends Controller
{
    public function index()
    {
        if (auth('siswa')->check()) {
            $siswaLogin = auth('siswa')->user();
            $siswas = Siswa::where('nis', $siswaLogin->nis)->get();
        } else {
            $siswas = Siswa::orderBy('nama_lengkap')->get();
        }

        $totalCatatan        = CatatanVerifikasi::count();
        $usulanMenungguCount = CatatanVerifikasi::where('status', 'menunggu')->count();
        $disetujuiCount      = CatatanVerifikasi::where('status', 'disetujui')->count();
        $ditolakCount        = CatatanVerifikasi::where('status', 'ditolak')->count();

        $usulanMenungguList = CatatanVerifikasi::with('siswa')
            ->where('status', 'menunggu')
            ->latest()
            ->get();

        return view('dashboardUmum', compact(
            'siswas',
            'totalCatatan',
            'usulanMenungguCount',
            'disetujuiCount',
            'ditolakCount',
            'usulanMenungguList'
        ));
    }
}