<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class siswaa extends Model
{
        use HasFactory;

    // Jika nama tabel di database menggunakan nama jamak 'master_poins'
    protected $table = 'siswaa';

    protected $fillable = [
        'nama',
        'kelas',
        'jurusan',
        'alamat',
        'jenis_kelamin',
        'poin_awal',
        'poin_kurang',
        'poin_tambah',
        'total_poin'
    ];
}
