<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\CatatanVerifikasi;
use App\Models\Usulan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class GuruFiturController extends Controller
{
    /**
     * Tampilkan form input catatan.
     */
    public function inputCatatan()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akun siswa tidak memiliki akses ke halaman Input Catatan.');
        }

        $siswas = Siswa::orderBy('nama_lengkap')->get(['nis', 'nama_lengkap', 'kelas']);
        return view('input_catatan', compact('siswas'));
    }

    /**
     * Simpan catatan dari form input.
     * Menggunakan CatatanVerifikasi.
     */
    public function simpanCatatan(Request $request)
    {
        if (Auth::guard('siswa')->check()) {
            return redirect()->route('dashboardUmum')->with('error', 'Akun siswa tidak memiliki izin untuk menginput catatan.');
        }

        $request->validate([
            'nis'             => 'required|exists:siswa,nis',
            'jenis'           => 'required|in:prestasi,pelanggaran',
            'nilai_poin'      => 'required|integer|min:1|max:500',
            'tanggal_catatan' => 'required|date',
            'kategori'        => 'nullable|string|max:100',
            'keterangan'      => 'required|string|max:500',
        ]);

        $user = Auth::user();
        $namaPencatat = $user ? $user->name : 'Guru/Staff';

        CatatanVerifikasi::create([
            'nis'             => $request->nis,
            'nama_pencatat'   => $namaPencatat,
            'jenis'           => $request->jenis,
            'nilai_poin'      => $request->nilai_poin,
            'tanggal_catatan' => $request->tanggal_catatan,
            'kategori'        => $request->kategori,
            'keterangan'      => $request->keterangan,
            'status'          => 'menunggu',
        ]);

        return redirect()->route('riwayat.catatan')->with('success', 'Catatan berhasil dikirim dan menunggu verifikasi.');
    }

    /**
     * Tampilkan riwayat catatan yang pernah dibuat oleh user ini.
     * Menggabungkan data dari tabel catatan_verifikasi DAN tabel usulan.
     */
    public function riwayatCatatan(Request $request)
    {
        $userWeb   = Auth::guard('web')->user();
        $userSiswa = Auth::guard('siswa')->user();

        $query = CatatanVerifikasi::with('siswa')->latest();

        // Jika login sebagai Siswa, filter berdasarkan NIS siswa tersebut
        // Jika login sebagai Admin/Guru (web), tampilkan seluruh catatan sistem agar sinkron
        if ($userSiswa) {
            $query->where('nis', $userSiswa->nis);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $riwayat = $query->paginate(15)->withQueryString();

        // Hitung statistik
        $statsQuery = CatatanVerifikasi::query();
        if ($userSiswa) {
            $statsQuery->where('nis', $userSiswa->nis);
        }

        $stats = [
            'total'     => (clone $statsQuery)->count(),
            'menunggu'  => (clone $statsQuery)->where('status', 'menunggu')->count(),
            'disetujui' => (clone $statsQuery)->where('status', 'disetujui')->count(),
            'ditolak'   => (clone $statsQuery)->where('status', 'ditolak')->count(),
        ];

        return view('riwayat_catatan', compact('riwayat', 'stats'));
    }

    /**
     * Tampilkan profil pengguna.
     */
    public function profil()
    {
        $user  = Auth::user();
        $siswa = auth('siswa')->user(); // akun siswa jika login via guard siswa
        return view('profil', compact('user', 'siswa'));
    }

    /**
     * Update profil pengguna.
     */
    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        // Jika tidak login tapi fitur diakses (hanya untuk testing lokal/fallback)
        if (!$user) {
            return redirect()->back()->with('error', 'Anda harus login untuk mengubah profil.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
