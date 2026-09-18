<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    protected $table = 'usulan';

    protected $fillable = [
        'nis',
        'nama_pengusul',
        'jenis',
        'poin',
        'keterangan',
        'status',
        'catatan_verifikasi',
        'verified_at',
    ];

    protected $casts = [
        'poin'        => 'integer',
        'verified_at' => 'datetime',
    ];

    /**
     * Relasi: setiap usulan dimiliki oleh satu siswa (via NIS)
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    /**
     * Scope: filter berdasarkan status
     */
    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', 'disetujui');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    /**
     * Label status yang ramah
     */
    public function getLabelStatusAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => 'Menunggu',
            'disetujui' => 'Disetujui',
            'ditolak'   => 'Ditolak',
            default     => '-',
        };
    }

    /**
     * Badge class Bootstrap berdasarkan status
     */
    public function getBadgeStatusAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => 'bg-warning text-dark',
            'disetujui' => 'bg-success',
            'ditolak'   => 'bg-danger',
            default     => 'bg-secondary',
        };
    }
}
