<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    protected $table = 'buku';

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'stok',
        'harga',
        'kategori_id',
    ];

    // =========================================================
    // Tugas 2A: ACCESSORS
    // =========================================================

    /**
     * Accessor: status_stok_badge
     * Return HTML badge Bootstrap berdasarkan jumlah stok.
     */
    public function getStatusStokBadgeAttribute(): string
    {
        if ($this->stok == 0) {
            return '<span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Habis</span>';
        } elseif ($this->stok <= 5) {
            return '<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>Menipis</span>';
        } elseif ($this->stok <= 15) {
            return '<span class="badge bg-info text-dark"><i class="bi bi-dash-circle me-1"></i>Sedang</span>';
        } else {
            return '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aman</span>';
        }
    }

    /**
     * Accessor: tahun_label
     * Return "Buku Baru" jika tahun >= 2024, "Buku Lama" jika sebelumnya.
     */
    public function getTahunLabelAttribute(): string
    {
        return $this->tahun_terbit >= 2024 ? 'Buku Baru' : 'Buku Lama';
    }

    // =========================================================
    // Tugas 2A: SCOPES
    // =========================================================

    /**
     * Scope: stokMenipis
     * Filter buku dengan stok < 5.
     */
    public function scopeStokMenipis(Builder $query): Builder
    {
        return $query->where('stok', '<', 5);
    }

    /**
     * Scope: hargaRange
     * Filter buku dengan harga antara $min dan $max.
     */
    public function scopeHargaRange(Builder $query, float $min, float $max): Builder
    {
        return $query->whereBetween('harga', [$min, $max]);
    }

    /**
     * Scope: terbaru
     * Filter buku dengan tahun_terbit >= 2024.
     */
    public function scopeTerbaru(Builder $query): Builder
    {
        return $query->where('tahun_terbit', '>=', 2024);
    }

    // =========================================================
    // RELASI
    // =========================================================

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
