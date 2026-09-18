<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'siswa';
    
    // Konfigurasi Primary Key menggunakan NIS
    protected $primaryKey = 'nis';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'nis', 
        'nama_lengkap', 
        'kelas', 
        'jurusan', 
        'alamat',
        'jenis_kelamin', 
        'poin_awal', 
        'poin_kurang',
        'poin_tambah', 
        'total_poin', 
        'prestasi', 
        'pelanggaran', 
        'password',
        'plain_password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'nis' => 'string',
        'poin_awal' => 'integer',
        'poin_kurang' => 'integer',
        'poin_tambah' => 'integer',
        'total_poin' => 'integer',
    ];

    /**
     * Helper method untuk menambah poin prestasi
     */
    public function tambahPrestasi(int $poin)
    {
        $this->increment('poin_tambah', $poin);
        $this->increment('total_poin', $poin);
    }

    /**
     * Helper method untuk mencatat poin pelanggaran (mengurangi total poin)
     */
    public function tambahPelanggaran(int $poin)
    {
        $this->increment('poin_kurang', $poin);
        $this->decrement('total_poin', $poin);
    }

    /**
     * Accessor untuk role siswa
     */
    public function getRoleAttribute()
    {
        return 'siswa';
    }
}