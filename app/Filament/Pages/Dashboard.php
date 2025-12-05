<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.dashboard';

    public function getTitle(): string
    {
        return 'Dashboard Admin';
    }

    public function getHeading(): string
    {
        return 'Selamat Datang, ' . auth()->user()->name . '! 👋';
    }

    public function getSubheading(): ?string
    {
        return 'Kelola agen Takaful Anda dengan mudah';
    }
}
