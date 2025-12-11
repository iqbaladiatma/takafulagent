<?php

namespace App\Filament\Agent\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Illuminate\Support\Facades\Auth;

class Dashboard extends BaseDashboard
{
    protected static ?string $title = 'Dashboard Agen';

    public function getTitle(): string
    {
        $user = Auth::user();
        if ($user && $user->agen) {
            return 'Selamat datang, ' . $user->agen->nama;
        }
        
        return 'Dashboard Agen';
    }

    public function getSubheading(): ?string
    {
        $user = Auth::user();
        
        if (!$user || !$user->agen) {
            return 'Profil agen belum diatur. Hubungi admin untuk mengatur profil agen Anda.';
        }

        return 'Kelola produk dan profil agen Anda dari panel ini.';
    }
}