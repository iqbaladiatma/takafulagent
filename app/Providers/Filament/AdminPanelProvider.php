<?php

namespace App\Providers\Filament;

use App\Http\Middleware\AdminMiddleware;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            // ->login()
            ->brandName('Takaful Admin Panel')
            ->brandLogo(asset('images/takaful-logo.svg'))
            ->brandLogoHeight('2.5rem')
            ->darkModeBrandLogo(asset('images/takaful-logo.svg'))
            ->favicon(asset('favicon.ico'))
            ->colors([
                'primary' => [
                    50 => '#E6F2FF',
                    100 => '#CCE5FF',
                    200 => '#99CBFF',
                    300 => '#66B0FF',
                    400 => '#3396FF',
                    500 => '#1D76BB', // Takaful Blue
                    600 => '#175E96',
                    700 => '#114771',
                    800 => '#0C2F4C',
                    900 => '#061826',
                    950 => '#030C13',
                ],
                'success' => [
                    50 => '#F0F9E8',
                    100 => '#E1F3D1',
                    200 => '#C3E7A3',
                    300 => '#A5DB75',
                    400 => '#8BC53F', // Takaful Green
                    500 => '#6FA032',
                    600 => '#5A8028',
                    700 => '#44601E',
                    800 => '#2F4014',
                    900 => '#19200A',
                    950 => '#0D1005',
                ],
                'warning' => Color::Amber,
                'danger' => Color::Red,
            ])
            ->font('Poppins')
            ->maxContentWidth('full')
            ->sidebarCollapsibleOnDesktop()
            // ->viteTheme('resources/css/filament/admin/theme.css')
            ->navigationGroups([
                'Manajemen Agen',
                'Pengaturan',
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                \App\Filament\Widgets\AgenStatsOverview::class,
                Widgets\AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                AdminMiddleware::class,
            ]);
    }
}
