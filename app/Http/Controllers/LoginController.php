<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); 
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'nis' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $nisInput = trim($request->nis);

        // 1. Cek Login untuk User / Admin (Tabel users)
        $user = User::where('nis', $nisInput)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user);
            $request->session()->regenerate();
            return redirect()->route('dashboardUmum');
        }

        // 2. Cek Login untuk Siswa (Tabel siswa)
        $siswa = Siswa::where('nis', $nisInput)->first();

        if (!$siswa && is_numeric($nisInput)) {
            $siswa = Siswa::where('nis', (int)$nisInput)->first();
        }

        if ($siswa && Hash::check($request->password, $siswa->password)) {
            Auth::guard('siswa')->login($siswa);
            $request->session()->regenerate();
            return redirect()->route('dashboardUmum');
        }

        return back()->withErrors([
            'nis' => 'NIS atau Password yang Anda masukkan salah.',
        ])->onlyInput('nis');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar / logout.');
    }
}