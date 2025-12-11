<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Agen;
use Illuminate\Support\Facades\Hash;

class AgentUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Buat user agent demo
        $agentUser = User::create([
            'name' => 'Demo Agent',
            'email' => 'agent@takaful.com',
            'password' => Hash::make('password'),
            'role' => 'agent',
        ]);

        // Buat agen demo dan hubungkan dengan user
        $agen = Agen::create([
            'user_id' => $agentUser->id,
            'nama' => 'Demo Agent',
            'kode_agen' => 'DEMO001',
            'telepon' => '08123456789',
            'wa_link' => 'https://wa.me/628123456789',
            'role' => 'Agen Takaful Demo',
            'deskripsi' => 'Agen demo untuk testing sistem.',
            'background_type' => 'gradient',
            'background_value' => 'blue-green',
            'tahun_pengalaman' => '8+',
            'klien_terlayani' => '250+',
            'layanan_unggulan' => [
                'Konsultasi Asuransi Syariah Gratis',
                'Proses Klaim Cepat & Mudah',
                'Pelayanan 24/7 via WhatsApp',
                'Analisis Kebutuhan Personal',
                'Follow Up Berkala'
            ],
        ]);

        // Buat beberapa produk demo
        $agen->products()->createMany([
            [
                'judul' => 'Asuransi Jiwa Syariah',
                'deskripsi' => 'Perlindungan jiwa sesuai prinsip syariah dengan manfaat optimal.',
                'urutan' => 1,
            ],
            [
                'judul' => 'Takaful Kesehatan',
                'deskripsi' => 'Perlindungan kesehatan keluarga dengan sistem gotong royong.',
                'urutan' => 2,
            ],
            [
                'judul' => 'Investasi Syariah',
                'deskripsi' => 'Investasi halal dengan potensi keuntungan yang menarik.',
                'urutan' => 3,
            ],
        ]);

        $this->command->info('Agent user dan data demo berhasil dibuat!');
        $this->command->info('Login agent: agent@takaful.com / password');
    }
}