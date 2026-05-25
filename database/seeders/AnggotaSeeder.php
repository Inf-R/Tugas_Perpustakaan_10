<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;
use Illuminate\Support\Carbon;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        $anggota = [
            // Remaja (umur < 20)
            ['nama' => 'Rizky Pratama',   'email' => 'rizky@email.com',   'telepon' => '081234567890', 'alamat' => 'Semarang',   'jenis_kelamin' => 'L', 'umur' => 17, 'status' => 'Aktif',    'created_at' => Carbon::now()],
            ['nama' => 'Aulia Putri',     'email' => 'aulia@email.com',   'telepon' => '082345678901', 'alamat' => 'Solo',       'jenis_kelamin' => 'P', 'umur' => 19, 'status' => 'Aktif',    'created_at' => Carbon::now()],
            // Dewasa (umur 20-50)
            ['nama' => 'Budi Santoso',    'email' => 'budi@email.com',    'telepon' => '083456789012', 'alamat' => 'Jakarta',    'jenis_kelamin' => 'L', 'umur' => 25, 'status' => 'Aktif',    'created_at' => Carbon::now()],
            ['nama' => 'Siti Rahayu',     'email' => 'siti@email.com',    'telepon' => '084567890123', 'alamat' => 'Bandung',    'jenis_kelamin' => 'P', 'umur' => 32, 'status' => 'Aktif',    'created_at' => Carbon::now()],
            ['nama' => 'Ahmad Fauzi',     'email' => 'ahmad@email.com',   'telepon' => '085678901234', 'alamat' => 'Surabaya',   'jenis_kelamin' => 'L', 'umur' => 45, 'status' => 'Nonaktif', 'created_at' => Carbon::now()->subMonth()],
            ['nama' => 'Dewi Lestari',    'email' => 'dewi@email.com',    'telepon' => '086789012345', 'alamat' => 'Yogyakarta', 'jenis_kelamin' => 'P', 'umur' => 38, 'status' => 'Aktif',    'created_at' => Carbon::now()->subMonth()],
            // Senior (umur > 50)
            ['nama' => 'Hendra Wijaya',   'email' => 'hendra@email.com',  'telepon' => '087890123456', 'alamat' => 'Medan',      'jenis_kelamin' => 'L', 'umur' => 55, 'status' => 'Aktif',    'created_at' => Carbon::now()],
            ['nama' => 'Sri Mulyani',     'email' => 'sri@email.com',     'telepon' => '088901234567', 'alamat' => 'Malang',     'jenis_kelamin' => 'P', 'umur' => 62, 'status' => 'Nonaktif', 'created_at' => Carbon::now()->subMonths(2)],
        ];

        foreach ($anggota as $item) {
            Anggota::firstOrCreate(
                ['email' => $item['email']],
                $item
            );
        }

        $this->command->info('✅ AnggotaSeeder: 8 anggota berhasil di-seed.');
    }
}
