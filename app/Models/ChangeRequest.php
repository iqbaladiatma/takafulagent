<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'agen_id',
        'type',
        'title',
        'description',
        'requested_data',
        'product_id',
        'status',
        'admin_notes',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'requested_data' => 'array',
        'approved_at' => 'datetime',
    ];

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">Menunggu</span>',
            'approved' => '<span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Disetujui</span>',
            'rejected' => '<span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Ditolak</span>',
        };
    }

    public function getTypeNameAttribute()
    {
        return match($this->type) {
            'profile' => 'Perubahan Profil',
            'product_add' => 'Tambah Produk',
            'product_edit' => 'Edit Produk',
            'product_delete' => 'Hapus Produk',
        };
    }
}