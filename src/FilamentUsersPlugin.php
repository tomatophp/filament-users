<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class FilamentUsersPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-user';
    }

    public function register(Panel $panel): void
    {
        if(!config('filament-users.publish_resource')){
            $panel->resources([
                    UserResource::class,
                ]);
        }
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return new static();
    }
}
