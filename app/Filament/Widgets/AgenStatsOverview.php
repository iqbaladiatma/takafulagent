<?php

namespace App\Filament\Widgets;

use App\Models\Agen;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AgenStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalAgen = Agen::count();
        $agenBulanIni = Agen::whereMonth('created_at', now()->month)->count();
        $agenDenganFoto = Agen::whereNotNull('foto')->count();

        return [
            Stat::make('Total Agen', $totalAgen)
                ->description('Total agen terdaftar')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, $totalAgen]),
            
            Stat::make('Agen Bulan Ini', $agenBulanIni)
                ->description('Agen baru bulan ' . now()->format('F'))
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('primary'),
            
            Stat::make('Agen dengan Foto', $agenDenganFoto)
                ->description('Dari ' . $totalAgen . ' total agen')
                ->descriptionIcon('heroicon-o-photo')
                ->color('warning'),
        ];
    }
}
