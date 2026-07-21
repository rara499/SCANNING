<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    // 1. Tampilkan Data Siswa (Halaman Data Siswa)
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Mengambil data siswa dengan pencarian (jika ada)
        $siswas = Siswa::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'LIKE', "%{$search}%")
                         ->orWhere('nis', 'LIKE', "%{$search}%")
                         ->orWhere('kelas', 'LIKE', "%{$search}%");
        })->paginate(10);

        return view('siswa.index', compact('siswas'));
    }

    // 2. Tambah Data Siswa Baru
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|string|unique:siswa,nis',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
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
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // 3. Hapus Data Siswa
    public function destroy($nis)
    {
        $siswa = Siswa::where('nis', $nis)->firstOrFail();
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}