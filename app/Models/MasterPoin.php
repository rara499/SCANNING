<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPoin extends Model
{
    use HasFactory;

    // Jika nama tabel di database menggunakan nama jamak 'master_poins'
    protected $table = 'master_poins';

    protected $fillable = [
        'nama_aturan',
        'tipe',
        'bobot_poin',
        'kategori',
    ];

    // Relasi ke Catatan Perilaku
    public function catatanPerilaku()
    {
        return $table->hasMany(CatatanPerilaku::class, 'master_poin_id');
    }
}