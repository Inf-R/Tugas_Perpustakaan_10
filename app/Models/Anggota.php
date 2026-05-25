<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class Anggota extends Model
{
    protected $table = 'anggota';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'jenis_kelamin',
        'umur',
        'status',
    ];

    // =========================================================
    // Tugas 2B: ACCESSORS
    // =========================================================

    /**
     * Accessor: status_badge
     * Return HTML badge Bootstrap berdasarkan status anggota.
     */
    public function getStatusBadgeAttribute(): string
    {
        return $this->status === 'Aktif'
            ? '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aktif</span>'
            : '<span class="badge bg-secondary"><i class="bi bi-x-circle me-1"></i>Nonaktif</span>';
    }

    /**
     * Accessor: kategori_usia
     * Return kategori usia berdasarkan umur anggota.
     */
    public function getKategoriUsiaAttribute(): string
    {
        if ($this->umur < 20) {
            return 'Remaja';
        } elseif ($this->umur <= 50) {
            return 'Dewasa';
        } else {
            return 'Senior';
        }
    }

    // =========================================================
    // Tugas 2B: SCOPES
    // =========================================================

    /**
     * Scope: jenisKelamin
     * Filter anggota berdasarkan jenis kelamin ('L' atau 'P').
     */
    public function scopeJenisKelamin(Builder $query, string $jk): Builder
    {
        return $query->where('jenis_kelamin', $jk);
    }

    /**
     * Scope: terdaftarBulanIni
     * Filter anggota yang created_at berada di bulan & tahun ini.
     */
    public function scopeTerdaftarBulanIni(Builder $query): Builder
    {
        return $query->whereMonth('created_at', Carbon::now()->month)
                     ->whereYear('created_at',  Carbon::now()->year);
    }
}
