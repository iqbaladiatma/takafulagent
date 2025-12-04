<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agen;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat Admin User
        User::create([
            'name' => 'Admin Takaful',
            'email' => 'admin@takaful.com',
            'password' => Hash::make('admin123'),
        ]);

        // Buat Sample Agen untuk testing
        Agen::create([
            'nama' => 'Ahmad Fauzi',
            'kode_agen' => 'TKF001',
            'telepon' => '081234567890',
            'role' => 'Senior Agen Takaful',
            'deskripsi' => 'Berpengalaman lebih dari 5 tahun dalam industri asuransi syariah. Siap membantu Anda menemukan solusi proteksi terbaik sesuai prinsip syariah.',
            'pencapaian' => 'Top Performer 2023, Melayani lebih dari 200 nasabah, Sertifikasi AAJI',
        ]);

        Agen::create([
            'nama' => 'Siti Nurhaliza',
            'kode_agen' => 'TKF002',
            'telepon' => '082345678901',
            'role' => 'Agen Takaful',
            'deskripsi' => 'Spesialis asuransi keluarga dan pendidikan. Membantu keluarga Indonesia merencanakan masa depan yang lebih baik dengan prinsip syariah.',
            'pencapaian' => 'Best Newcomer 2024, Fokus pada produk pendidikan',
        ]);
    }
}
