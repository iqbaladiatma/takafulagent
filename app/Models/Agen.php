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
        'background_image',
        'background_type',
        'background_value',
        'deskripsi',
        'role',
        'pencapaian',
    ];

    /**
<<<<<<< HEAD
=======
     * Relasi ke Products
     */
    public function products()
    {
        return $this->hasMany(Product::class)->orderBy('urutan');
    }

    /**
     * Get background style
     */
    public function getBackgroundStyleAttribute()
    {
        if ($this->background_type === 'image' && $this->background_image) {
            return "background-image: url('" . asset('storage/' . $this->background_image) . "'); background-size: cover; background-position: center;";
        }

        $gradients = [
            'blue-green' => 'background: linear-gradient(135deg, #1D76BB 0%, #008542 100%);',
            'blue-purple' => 'background: linear-gradient(135deg, #1D76BB 0%, #6B46C1 100%);',
            'green-teal' => 'background: linear-gradient(135deg, #008542 0%, #0D9488 100%);',
            'orange-red' => 'background: linear-gradient(135deg, #F97316 0%, #DC2626 100%);',
            'pink-purple' => 'background: linear-gradient(135deg, #EC4899 0%, #8B5CF6 100%);',
            'yellow-orange' => 'background: linear-gradient(135deg, #EAB308 0%, #F97316 100%);',
        ];

        if ($this->background_type === 'gradient') {
            return $gradients[$this->background_value] ?? $gradients['blue-green'];
        }

        // Default
        return $gradients['blue-green'];
    }

    /**
>>>>>>> 0dab6f0 (menambahkan bacground di foto porfilenya di setiap agentnya)
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
