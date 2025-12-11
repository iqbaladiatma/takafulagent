<?php

namespace App\Filament\Agent\Resources\ProductResource\Pages;

use App\Filament\Agent\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        $user = Auth::user();
        
        if (!$user || !$user->agen) {
            return [
                Actions\Action::make('setup_profile')
                    ->label('Setup Profil Agen')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->color('warning')
                    ->url('/agent')
                    ->disabled()
                    ->extraAttributes([
                        'title' => 'Hubungi admin untuk mengatur profil agen Anda'
                    ]),
            ];
        }

        return [
            Actions\CreateAction::make()
                ->label('Tambah Produk Baru')
                ->icon('heroicon-o-plus'),
        ];
    }

    public function getTitle(): string
    {
        return 'Produk Saya';
    }

    public function getSubheading(): ?string
    {
        $user = Auth::user();
        
        if (!$user || !$user->agen) {
            return 'Profil agen belum diatur. Hubungi admin untuk mengatur profil agen Anda.';
        }

        return 'Kelola produk-produk yang Anda tawarkan kepada nasabah.';
    }
}