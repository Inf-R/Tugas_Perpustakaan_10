<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    /**
     * Nama tabel di database.
     */
    protected $table = 'kategori';

    /**
     * Tugas 1: Fillable sesuai spesifikasi.
     */
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'icon',
        'warna',
    ];

    /**
     * Relasi: Kategori memiliki banyak Buku.
     */
    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class, 'kategori_id');
    }
}
