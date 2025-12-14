<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
        'urutan',
    ];

    /**
     * Relasi ke Agens (Many-to-Many)
     */
    public function agens()
    {
        return $this->belongsToMany(Agen::class, 'agen_product')
                    ->withPivot(['custom_wa_link', 'custom_description', 'urutan'])
                    ->withTimestamps();
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
     * Generate WhatsApp link untuk agen tertentu
     */
    public function getWaLinkForAgen(Agen $agen)
    {
        // Cek apakah ada custom WA link di pivot table
        $pivot = $this->agens()->where('agen_id', $agen->id)->first();
        if ($pivot && $pivot->pivot->custom_wa_link) {
            return $pivot->pivot->custom_wa_link;
        }

        // Generate default WA link
        $phone = preg_replace('/[^0-9]/', '', $agen->telepon);
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }
        
        $text = "Halo {$agen->nama}, saya tertarik dengan produk *{$this->judul}*. Mohon informasi lebih lanjut.";
        
        return 'https://wa.me/' . $phone . '?text=' . urlencode($text);
    }

    /**
     * Get custom description untuk agen tertentu
     */
    public function getDescriptionForAgen(Agen $agen)
    {
        $pivot = $this->agens()->where('agen_id', $agen->id)->first();
        if ($pivot && $pivot->pivot->custom_description) {
            return $pivot->pivot->custom_description;
        }
        
        return $this->deskripsi;
    }
}
