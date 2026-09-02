<?php

namespace App\Providers\Filament;

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
use App\Filament\Candidat\Pages\MonDossier;

class CandidatPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('candidat')
            ->path('candidat')
//            ->viteTheme('resources/css/filament/admin/theme.css') // modif du 30/08
            ->colors([
                'primary' => Color::Teal,
                'gray' => Color::Stone,
            ])
            ->font('Poppins')
            ->discoverResources(in: app_path('Filament/Candidat/Resources'), for: 'App\\Filament\\Candidat\\Resources')
            ->discoverPages(in: app_path('Filament/Candidat/Pages'), for: 'App\\Filament\\Candidat\\Pages')
            ->pages([
                MonDossier::class, // Ta page devient la seule et unique page principale !
//                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Candidat/Widgets'), for: 'App\\Filament\\Candidat\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ]);
    }
}
