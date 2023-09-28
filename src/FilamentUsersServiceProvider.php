<?php

namespace TomatoPHP\FilamentUsers;

use Illuminate\Support\ServiceProvider;


class FilamentUsersServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
           \TomatoPHP\FilamentUsers\Console\PublishUserResourceCommand::class,
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/filament-users.php', 'filament-users');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/filament-users.php' => config_path('filament-users.php'),
        ], 'filament-users-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'filament-users-migrations');
        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'filament-users');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/filament-users'),
        ], 'filament-users-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'filament-users');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/filament-users'),
        ], 'filament-users-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        //you boot methods here
    }
}
