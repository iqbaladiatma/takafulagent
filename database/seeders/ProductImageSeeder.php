<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        
        // Sample insurance product images (using placeholder service)
        $sampleImages = [
            'https://via.placeholder.com/400x400/1D76BB/FFFFFF?text=Asuransi+Jiwa',
            'https://via.placeholder.com/400x400/8CC63F/FFFFFF?text=Asuransi+Kesehatan',
            'https://via.placeholder.com/400x400/FF6B35/FFFFFF?text=Asuransi+Pendidikan',
            'https://via.placeholder.com/400x400/6C5CE7/FFFFFF?text=Asuransi+Kendaraan',
            'https://via.placeholder.com/400x400/00B894/FFFFFF?text=Asuransi+Rumah',
            'https://via.placeholder.com/400x400/E17055/FFFFFF?text=Asuransi+Bisnis',
            'https://via.placeholder.com/400x400/0984E3/FFFFFF?text=Asuransi+Perjalanan',
            'https://via.placeholder.com/400x400/A29BFE/FFFFFF?text=Asuransi+Syariah',
            'https://via.placeholder.com/400x400/FD79A8/FFFFFF?text=Asuransi+Keluarga',
            'https://via.placeholder.com/400x400/FDCB6E/FFFFFF?text=Asuransi+Investasi',
        ];
        
        foreach ($products as $index => $product) {
            if (!$product->gambar) {
                // For demo purposes, we'll just set a placeholder URL
                // In real scenario, you would download and store the image
                $imageIndex = $index % count($sampleImages);
                
                // Create a simple filename based on product
                $filename = 'product-' . $product->id . '.png';
                
                // Update product with placeholder image path
                $product->update([
                    'gambar' => 'product-images/' . $filename
                ]);
                
                $this->command->info("Updated product: {$product->judul} with placeholder image");
            }
        }
        
        $this->command->info("Note: Placeholder images set. In production, upload real product images through admin panel.");
    }
}