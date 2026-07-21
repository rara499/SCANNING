<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    // TAMBAHKAN BARIS INI: Beritahu Laravel kalau primary key-nya adalah 'nis'
    protected $primaryKey = 'nis';
    
    // TAMBAHKAN BARIS INI: Jika NIS bukan auto-increment (input manual)
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'nis', 'nama_lengkap', 'kelas', 'alamat',
        'jenis_kelamin', 'poin_awal', 'poin_kurang',
        'poin_tambah', 'total_poin', 'password'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'nis' => 'string',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}