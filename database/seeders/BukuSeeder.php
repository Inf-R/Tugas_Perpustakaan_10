<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        $buku = [
            // Stok = 0 (Habis), tahun lama
            ['judul' => 'Clean Code',                       'pengarang' => 'Robert C. Martin', 'penerbit' => 'Prentice Hall',    'tahun_terbit' => 2008, 'stok' => 0,  'harga' => 150000, 'kategori_id' => 1],
            // Stok 1-5 (Menipis), tahun lama
            ['judul' => 'The Pragmatic Programmer',         'pengarang' => 'David Thomas',     'penerbit' => 'Addison-Wesley',   'tahun_terbit' => 2019, 'stok' => 3,  'harga' => 175000, 'kategori_id' => 1],
            ['judul' => 'Computer Networking',              'pengarang' => 'James Kurose',     'penerbit' => 'Pearson',          'tahun_terbit' => 2020, 'stok' => 4,  'harga' => 200000, 'kategori_id' => 4],
            // Stok 6-15 (Sedang), buku baru 2024+
            ['judul' => 'Laravel: Up & Running 3rd Ed',    'pengarang' => 'Matt Stauffer',    'penerbit' => 'O\'Reilly',        'tahun_terbit' => 2024, 'stok' => 10, 'harga' => 220000, 'kategori_id' => 1],
            ['judul' => 'Database System Concepts',        'pengarang' => 'Silberschatz',     'penerbit' => 'McGraw-Hill',      'tahun_terbit' => 2023, 'stok' => 8,  'harga' => 195000, 'kategori_id' => 2],
            ['judul' => 'CSS in Depth',                    'pengarang' => 'Keith J. Grant',   'penerbit' => 'Manning',          'tahun_terbit' => 2024, 'stok' => 12, 'harga' => 160000, 'kategori_id' => 3],
            // Stok > 15 (Aman), buku baru 2024+
            ['judul' => 'Python for Data Science',         'pengarang' => 'Jake VanderPlas',  'penerbit' => 'O\'Reilly',        'tahun_terbit' => 2024, 'stok' => 20, 'harga' => 210000, 'kategori_id' => 5],
            ['judul' => 'Hands-On Machine Learning',       'pengarang' => 'Aurélien Géron',   'penerbit' => 'O\'Reilly',        'tahun_terbit' => 2022, 'stok' => 18, 'harga' => 250000, 'kategori_id' => 5],
            ['judul' => 'Web Design with HTML & CSS',      'pengarang' => 'Jon Duckett',      'penerbit' => 'Wiley',            'tahun_terbit' => 2024, 'stok' => 25, 'harga' => 130000, 'kategori_id' => 3],
            ['judul' => 'CCNA Study Guide',                'pengarang' => 'Todd Lammle',      'penerbit' => 'Sybex',            'tahun_terbit' => 2021, 'stok' => 16, 'harga' => 180000, 'kategori_id' => 4],
        ];

        foreach ($buku as $item) {
            Buku::firstOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }

        $this->command->info('✅ BukuSeeder: 10 buku berhasil di-seed.');
    }
}
