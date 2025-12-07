<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'agen_id',
        'judul',
        'gambar',
        'deskripsi',
        'urutan',
    ];

    /**
     * Relasi ke Agen
     */
    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    /**
     * Get gambar URL
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }
        return asset('images/default-product.png');
    }

    /**
     * Generate WhatsApp link dengan text produk
     */
    public function getWaLinkAttribute()
    {
        $phone = preg_replace('/[^0-9]/', '', $this->agen->telepon);
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }
        
        $text = "Halo {$this->agen->nama}, saya tertarik dengan produk *{$this->judul}*. Mohon informasi lebih lanjut.";
        
        return 'https://wa.me/' . $phone . '?text=' . urlencode($text);
    }
}
