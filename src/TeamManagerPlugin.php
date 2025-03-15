<?php

namespace Manhamprod\FilamentTeamManager;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamInvitationResource;
use Manhamprod\FilamentTeamManager\Filament\Resources\TeamResource;

class TeamManagerPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-team-manager';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                TeamResource::class,
                TeamInvitationResource::class,
            ])
            ->pages([
                // Tes pages si besoin
            ])
            ->widgets([
                // Widgets si besoin
            ])
            ->navigationGroups([
                'Teams',
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
