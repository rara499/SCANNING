<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardUmumController;
use Illuminate\Support\Facades\Artisan;

// 1. Splash Screen
Route::get('/', function () {
    return view('splash');
});

// 2. Login & Logout
Route::get('/login', function () {
    return view('login'); 
})->name('login');

Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 3. Menu Grid
Route::get('/sidebar-menu', function () {
    return view('sidebar_menu');
})->name('sidebar_menu');

Route::get('/dashboard', [SiswaController::class, 'index'])->name('dashboard');
Route::get('/dashboard-umum', [DashboardUmumController::class, 'index'])->name('dashboardUmum');

// 4. Fitur Data Siswa (CRUD)
Route::get('/data-siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('/data-siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::delete('/data-siswa/{nis}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// Route Fitur Lainnya (Dummy)
Route::get('/dashboard-guru', function() { return "Halaman Dashboard Guru"; })->name('dashboard.guru');
Route::get('/surat-panggilan', function() { return "Halaman Surat Panggilan"; })->name('surat.panggilan');
Route::get('/usulan-verifikasi', function() { return "Halaman Daftar Usulan Verifikasi"; })->name('usulan.verifikasi');
Route::get('/pencatatan-karakter', function() { return "Halaman Pencatatan Aktivitas & Karakter"; })->name('pencatatan.karakter');
Route::get('/dashboard-verifikasi', function() { return "Halaman Dashboard Verifikasi"; })->name('dashboard.verifikasi');
Route::get('/verifikasi-catatan', function() { return "Halaman Dashboard Verifikasi Catatan"; })->name('verifikasi.catatan');
Route::get('/input-catatan', function() { return "Halaman Form Input Catatan"; })->name('input.catatan');
Route::get('/riwayat-catatan', function() { return "Halaman Daftar Riwayat Catatan"; })->name('riwayat.catatan');
Route::get('/poin-siswa', function() { return "Halaman Poin Siswa Perkelas"; })->name('poin.siswa');
Route::get('/profil', function() { return "Halaman Profil Pengguna"; })->name('profil');

// 5. Reset Cache Utility
Route::get('/clear', function() {
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache berhasil dihapus! Silakan buka kembali halaman utama.";
});