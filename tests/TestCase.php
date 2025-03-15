<?php

namespace Manhamprod\FilamentTeamManager\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Manhamprod\FilamentTeamManager\FilamentTeamManagerServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Livewire\LivewireServiceProvider::class,
            \Filament\FilamentServiceProvider::class,
            FilamentTeamManagerServiceProvider::class,
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Tu peux charger tes migrations du package ici
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Ou utiliser les migrations Laravel classiques
        $this->artisan('migrate', ['--database' => 'testbench'])->run();
    }

    // Optionnel : config custom
    protected function getEnvironmentSetUp($app)
    {
        // Setup DB test
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
