<?php

namespace App\Filament\Agent\Resources\ProfileResource\Pages;

use App\Filament\Agent\Resources\ProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProfiles extends ListRecords
{
    protected static string $resource = ProfileResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTitle(): string
    {
        return 'Profil Saya';
    }

    public function getSubheading(): ?string
    {
        $user = Auth::user();
        
        if (!$user || !$user->agen) {
            return 'Profil agen belum diatur. Hubungi admin untuk mengatur profil agen Anda.';
        }

        return 'Kelola informasi profil dan tampilan halaman agen Anda.';
    }
}