<?php

namespace App\Filament\Agent\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = Auth::user();
        
        if (!$user || !$user->agen) {
            return [
                Stat::make('Status', 'Profil Belum Diatur')
                    ->description('Hubungi admin untuk setup')
                    ->descriptionIcon('heroicon-m-exclamation-triangle')
                    ->color('warning'),
            ];
        }

        $agen = $user->agen;
        
        // Product stats
        $totalProducts = $agen->products()->count();
        $productsWithImage = $agen->products()->whereNotNull('gambar')->count();
        
        // Visit stats
        $totalVisits30Days = \App\Models\ProfileVisit::getTotalVisits($agen->id, 30);
        $uniqueVisitors30Days = \App\Models\ProfileVisit::getUniqueVisitors($agen->id, 30);
        $totalVisits7Days = \App\Models\ProfileVisit::getTotalVisits($agen->id, 7);
        $uniqueVisitors7Days = \App\Models\ProfileVisit::getUniqueVisitors($agen->id, 7);

        return [
            Stat::make('Pengunjung Profil', $uniqueVisitors30Days)
                ->description('Pengunjung unik 30 hari terakhir')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([
                    $uniqueVisitors7Days,
                    $uniqueVisitors30Days,
                ]),

            Stat::make('Total Kunjungan', $totalVisits30Days)
                ->description('Total kunjungan 30 hari terakhir')
                ->descriptionIcon('heroicon-m-eye')
                ->color('info')
                ->chart([
                    $totalVisits7Days,
                    $totalVisits30Days,
                ]),

            Stat::make('Total Produk', $totalProducts)
                ->description('Produk yang Anda kelola')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary')
                ->url('/agent/products'),

            Stat::make('Produk Lengkap', $productsWithImage)
                ->description('Produk dengan gambar')
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning'),
        ];
    }
}