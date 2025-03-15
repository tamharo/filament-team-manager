<?php

namespace Manhamprod\FilamentTeamManager;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Manhamprod\FilamentTeamManager\Http\Middleware\HandleTeamInvitationAfterLogin;


class FilamentTeamManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views/mail', 'Manhamprod\FilamentTeamManager');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-team-manager.php', 'filament-team-manager');

        $this->publishes([
            __DIR__.'/../config/filament-team-manager.php' => config_path('filament-team-manager.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../src/Views' => resource_path('views/vendor/filament-team-manager'),
        ], 'views');

    }

    public function register()
    {
        //
    }
}