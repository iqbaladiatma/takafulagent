<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class MasterProductSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Hapus produk yang sudah ada untuk demo
        Product::truncate();

        // Buat produk master yang bisa dipilih oleh agen
        $masterProducts = [
            [
                'judul' => 'Takaful Jiwa Individual',
                'deskripsi' => 'Perlindungan jiwa syariah dengan manfaat optimal untuk individu dan keluarga. Memberikan ketenangan pikiran dengan prinsip tolong-menolong.',
                'urutan' => 1,
            ],
            [
                'judul' => 'Takaful Kesehatan Keluarga',
                'deskripsi' => 'Perlindungan kesehatan komprehensif untuk seluruh anggota keluarga dengan sistem gotong royong sesuai syariah.',
                'urutan' => 2,
            ],
            [
                'judul' => 'Takaful Pendidikan',
                'deskripsi' => 'Investasi pendidikan anak dengan perlindungan jiwa orang tua. Masa depan cerah untuk buah hati tercinta.',
                'urutan' => 3,
            ],
            [
                'judul' => 'Takaful Haji & Umrah',
                'deskripsi' => 'Tabungan ibadah haji dan umrah dengan perlindungan syariah. Wujudkan impian beribadah ke tanah suci.',
                'urutan' => 4,
            ],
            [
                'judul' => 'Takaful Kendaraan',
                'deskripsi' => 'Perlindungan kendaraan bermotor dengan prinsip syariah. Berkendara dengan tenang dan berkah.',
                'urutan' => 5,
            ],
            [
                'judul' => 'Takaful Mikro',
                'deskripsi' => 'Perlindungan terjangkau untuk masyarakat menengah ke bawah. Akses mudah, manfaat maksimal.',
                'urutan' => 6,
            ],
            [
                'judul' => 'Takaful Investasi Syariah',
                'deskripsi' => 'Investasi halal dengan potensi keuntungan menarik. Kembangkan harta dengan cara yang berkah.',
                'urutan' => 7,
            ],
            [
                'judul' => 'Takaful Kecelakaan Diri',
                'deskripsi' => 'Perlindungan dari risiko kecelakaan dengan santunan yang memadai. Hidup lebih tenang dan terlindungi.',
                'urutan' => 8,
            ],
            [
                'judul' => 'Takaful Rumah & Properti',
                'deskripsi' => 'Perlindungan rumah dan properti dari berbagai risiko. Aset berharga terjaga dengan prinsip syariah.',
                'urutan' => 9,
            ],
            [
                'judul' => 'Takaful Bisnis & Usaha',
                'deskripsi' => 'Perlindungan komprehensif untuk bisnis dan usaha. Kembangkan usaha dengan perlindungan syariah.',
                'urutan' => 10,
            ],
        ];

        foreach ($masterProducts as $product) {
            Product::create($product);
        }

        $this->command->info('Master products berhasil dibuat!');
        $this->command->info('Total: ' . count($masterProducts) . ' produk master');
    }
}