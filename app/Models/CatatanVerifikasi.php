<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatatanVerifikasi extends Model
{
    protected $table = 'catatan_verifikasi';

    protected $fillable = [
        'nis',
        'jenis',
        'kategori',
        'keterangan',
        'nilai_poin',
        'tanggal_catatan',
        'nama_pencatat',
        'status',
        'catatan_admin',
        'verified_at',
    ];

    protected $casts = [
        'nilai_poin'     => 'integer',
        'tanggal_catatan'=> 'date',
        'verified_at'    => 'datetime',
    ];

    /**
     * Relasi ke Siswa (via NIS)
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }

    /* ── Query Scopes ── */
    public function scopeMenunggu($query)   { return $query->where('status', 'menunggu'); }
    public function scopeDisetujui($query)  { return $query->where('status', 'disetujui'); }
    public function scopeDitolak($query)    { return $query->where('status', 'ditolak'); }

    /* ── Accessor: label status ── */
    public function getLabelStatusAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => 'Menunggu',
            'disetujui' => 'Disetujui',
            'ditolak'   => 'Ditolak',
            default     => '-',
        };
    }

    /* ── Accessor: badge class ── */
    public function getBadgeStatusAttribute(): string
    {
        return match($this->status) {
            'menunggu'  => 'badge-menunggu',
            'disetujui' => 'badge-disetujui',
            'ditolak'   => 'badge-ditolak',
            default     => '',
        };
    }

    /* ── Accessor compatibility with Usulan model ── */
    public function getNamaPengusulAttribute()
    {
        return $this->nama_pencatat;
    }

    public function getPoinAttribute()
    {
        return $this->nilai_poin;
    }

    public function getCatatanVerifikasiAttribute()
    {
        return $this->catatan_admin;
    }
}


