<?php

namespace App\Filament\Widgets;

use App\Models\Agen;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AgenStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';

    protected function getStats(): array
    {
        $totalAgen = Agen::count();
        $agenBulanIni = Agen::whereMonth('created_at', now()->month)->count();
        $agenDenganFoto = Agen::whereNotNull('foto')->count();
        $persentaseFoto = $totalAgen > 0 ? round(($agenDenganFoto / $totalAgen) * 100) : 0;

        // Get last 7 days data for chart
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $chartData[] = Agen::whereDate('created_at', '<=', $date)->count();
        }

        return [
            Stat::make('Total Agen Terdaftar', $totalAgen)
                ->description($totalAgen > 0 ? 'Agen profesional siap melayani' : 'Belum ada agen terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart($chartData)
                ->extraAttributes([
                    'class' => 'stat-card-primary',
                ]),
            
            Stat::make('Agen Baru Bulan Ini', $agenBulanIni)
                ->description('Bergabung di bulan ' . now()->translatedFormat('F Y'))
                ->descriptionIcon($agenBulanIni > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-minus')
                ->color('primary')
                ->extraAttributes([
                    'class' => 'stat-card-secondary',
                ]),
            
            Stat::make('Profil Lengkap', $agenDenganFoto . ' / ' . $totalAgen)
                ->description($persentaseFoto . '% agen memiliki foto profil')
                ->descriptionIcon('heroicon-m-photo')
                ->color($persentaseFoto >= 80 ? 'success' : ($persentaseFoto >= 50 ? 'warning' : 'danger'))
                ->extraAttributes([
                    'class' => 'stat-card-tertiary',
                ]),
        ];
    }
}
