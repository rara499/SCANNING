<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardUmumController;
use App\Http\Controllers\UsulanController;
use App\Http\Controllers\VerifikasiDashboardController;
use App\Http\Controllers\VerifikasiCatatanController;
use App\Http\Controllers\GuruFiturController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

// 1. Splash Screen
Route::get('/', function () {
    return view('splash');
});

// 2. Login & Logout
Route::get('/login', function () {
    return view('login'); 
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']); 
Route::match(['get', 'post'], '/logout', [LoginController::class, 'logout'])->name('logout');

// 3. Menu & Dashboard
Route::get('/sidebar-menu', function () {
    $pendingCatatan = 0;
    if (auth()->check() && auth()->user()->role === 'admin') {
        $pendingCatatan = \App\Models\CatatanVerifikasi::where('status', 'menunggu')->count();
    }
    return view('sidebar_menu', compact('pendingCatatan'));
})->name('sidebar_menu');

Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
Route::get('/dashboard-umum', [DashboardUmumController::class, 'index'])->name('dashboardUmum');

// 4. Fitur Data Siswa (CRUD, Detail, Catatan Sikap, Cetak Surat)
Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data.siswa');
Route::post('/data-siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/data-siswa/{nis}', [SiswaController::class, 'show'])->name('siswa.show');
Route::put('/data-siswa/{nis}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/data-siswa/{nis}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// Fitur Tombol "Catatan Sikap" (Update Poin Prestasi/Pelanggaran)
Route::post('/catatan-sikap', [SiswaController::class, 'updateSikap'])->name('catatan.store');

// Fitur Tombol "Surat" (Cetak PDF Surat Peringatan)
Route::get('/cetak-surat/{nis}', [SiswaController::class, 'cetakSurat'])->name('surat.cetak');

// 5. Route Fitur Lainnya
Route::get('/dashboard-guru', function() { return "Halaman Dashboard Guru"; })->name('dashboard.guru');
// Route::get('/data-siswa', function() { return "Data Siswa"; })->name('data.siswa');
// Fitur Usulan Verifikasi
Route::get('/usulan-verifikasi',                [UsulanController::class, 'index'])->name('usulan.verifikasi');
Route::post('/usulan-verifikasi',               [UsulanController::class, 'store'])->name('usulan.simpan');
Route::patch('/usulan-verifikasi/{id}/proses',  [UsulanController::class, 'verifikasi'])->name('usulan.proses');
Route::delete('/usulan-verifikasi/{id}',        [UsulanController::class, 'destroy'])->name('usulan.hapus');
// Route::get('/pencatatan-karakter', function() { return "Halaman Pencatatan Aktivitas & Karakter"; })->name('pencatatan.karakter');
Route::get('/dashboard-verifikasi', [VerifikasiDashboardController::class, 'index'])->name('dashboard.verifikasi');
Route::get('/verifikasi-catatan', [VerifikasiCatatanController::class, 'index'])->name('verifikasi.catatan');
Route::post('/verifikasi-catatan', [VerifikasiCatatanController::class, 'store'])->name('verifikasi.catatan.simpan');
Route::patch('/verifikasi-catatan/{id}/proses', [VerifikasiCatatanController::class, 'proses'])->name('verifikasi.catatan.proses');
Route::delete('/verifikasi-catatan/{id}', [VerifikasiCatatanController::class, 'destroy'])->name('verifikasi.catatan.hapus');
Route::get('/input-catatan', [GuruFiturController::class, 'inputCatatan'])->name('input.catatan');
Route::post('/input-catatan', [GuruFiturController::class, 'simpanCatatan'])->name('input.catatan.simpan');
Route::get('/riwayat-catatan', [GuruFiturController::class, 'riwayatCatatan'])->name('riwayat.catatan');
Route::get('/profil', [GuruFiturController::class, 'profil'])->name('profil');
Route::post('/profil', [GuruFiturController::class, 'updateProfil'])->name('profil.update');

// 6. Reset Cache Utility
Route::get('/clear', function() {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache berhasil dihapus! Silakan buka kembali halaman utama.";
});

Route::get('/buat-sandi-saya', function() {
    echo Hash::make('admin123');
});