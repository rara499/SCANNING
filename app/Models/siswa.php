<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $fillable = [
        'nis',
        'password',
        'nama_lengkap',
        'kelas',
        'alamat'
    ];
}
