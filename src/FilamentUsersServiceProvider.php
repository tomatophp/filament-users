<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Lab404\Impersonate\Events\LeaveImpersonation;
use Lab404\Impersonate\Events\TakeImpersonation;
use TomatoPHP\FilamentUsers\Console\FilamentUserTeamsCommand;

class FilamentUsersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->commands([
            FilamentUserTeamsCommand::class,
        ]);

        // Register Config file
        $this->mergeConfigFrom(__DIR__ . '/../config/filament-users.php', 'filament-users');

        // Publish Config
        $this->publishes([
            __DIR__ . '/../config/filament-users.php' => config_path('filament-users.php'),
        ], 'filament-users-config');

        // Register Langs
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'filament-users');

        // Publish Lang
        $this->publishes([
            __DIR__ . '/../resources/lang' => base_path('lang/vendor/filament-users'),
        ], 'filament-users-lang');

        $this->app->bind('filament-user', function () {
            return new \TomatoPHP\FilamentUsers\Services\FilamentUserServices;
        });

        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'filament-users');
    }

    public function boot(): void
    {
        $this->registerImpersonate();
    }

    public function registerImpersonate(): void
    {
        Event::listen(TakeImpersonation::class, fn () => $this->clearAuthHashes());
        Event::listen(LeaveImpersonation::class, fn () => $this->clearAuthHashes());

        FilamentView::registerRenderHook(
            config('filament-users.impersonate.banner.render_hook', 'panels::body.start'),
            static fn (): string => Blade::render('<x-filament-users::banner/>')
        );
    }

    protected function clearAuthHashes(): void
    {
        session()->forget(array_unique([
            'password_hash_' . session('impersonate.guard'),
            'password_hash_' . Filament::getCurrentOrDefaultPanel()->getAuthGuard(),
            'password_hash_' . auth()->getDefaultDriver(),
            'password_hash_sanctum',
        ]));
    }
}
