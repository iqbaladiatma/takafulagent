<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $table = 'agens';

    protected $fillable = [
        'nama',
        'kode_agen',
        'telepon',
        'wa_link',
        'foto',
        'deskripsi',
        'role',
        'pencapaian',
    ];

    /**
     * Generate WhatsApp link otomatis dari nomor telepon
     */
    public function getWaLinkAttribute($value)
    {
        if ($value) {
            return $value;
        }

        // Auto-generate dari telepon
        $phone = preg_replace('/[^0-9]/', '', $this->telepon);
        
        // Jika diawali 0, ganti dengan 62
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        return 'https://wa.me/' . $phone;
    }

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }

        return asset('images/default-avatar.png');
    }
}
