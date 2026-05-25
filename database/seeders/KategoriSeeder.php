<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Tugas 1: Seed data 5 kategori buku.
     */
    public function run(): void
    {
        $kategori = [
            [
                'nama_kategori' => 'Programming',
                'deskripsi'     => 'Buku-buku tentang pemrograman, algoritma, dan pengembangan software.',
                'icon'          => 'code-slash',
                'warna'         => 'primary',
            ],
            [
                'nama_kategori' => 'Database',
                'deskripsi'     => 'Buku tentang sistem basis data, SQL, NoSQL, dan manajemen data.',
                'icon'          => 'database',
                'warna'         => 'success',
            ],
            [
                'nama_kategori' => 'Web Design',
                'deskripsi'     => 'Buku tentang desain web, UI/UX, CSS, dan front-end development.',
                'icon'          => 'palette',
                'warna'         => 'info',
            ],
            [
                'nama_kategori' => 'Networking',
                'deskripsi'     => 'Buku tentang jaringan komputer, protokol, dan infrastruktur IT.',
                'icon'          => 'wifi',
                'warna'         => 'warning',
            ],
            [
                'nama_kategori' => 'Data Science',
                'deskripsi'     => 'Buku tentang analisis data, machine learning, dan kecerdasan buatan.',
                'icon'          => 'graph-up',
                'warna'         => 'danger',
            ],
        ];

        foreach ($kategori as $item) {
            Kategori::firstOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                $item
            );
        }

        $this->command->info('✅ KategoriSeeder: 5 kategori berhasil di-seed.');
    }
}
