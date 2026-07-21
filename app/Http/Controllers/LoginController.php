<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function authenticate(Request $request)
    {
        $valid = $request->validate([
            'nis' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // 1. Cari siswa berdasarkan NIS
        $siswa = \App\Models\Siswa::where('nis', 'LIKE', '%' . trim($valid['nis']) . '%')->first();
        // dd($siswa);

        // 2. Jika siswa ditemukan, verifikasi password-nya secara manual
        // if ($siswa) {
        //     Auth::guard('web')->login($siswa);
        //     $request->session()->regenerate();
        //     return redirect('/dashboard'); 
        // }

        if ($siswa && \Illuminate\Support\Facades\Hash::check($valid['password'], $siswa->password)) {
    Auth::guard('web')->login($siswa);
    $request->session()->regenerate();
    return redirect()->route('sidebar_menu');
    // return redirect('/sidebar_menu'); // Redirect ke halaman menu utama setelah login berhasil
}

    return back()->withErrors([
        'nis' => 'Password yang Anda masukkan salah.',
        ])->onlyInput('nis');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}