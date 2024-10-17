<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TomatoPHP\FilamentUsers\Resources\TeamResource;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class FilamentUsersPlugin implements Plugin
{
    protected static bool $useAvatar = false;

    public function getId(): string
    {
        return 'filament-user';
    }

    public function useAvatar(bool $useAvatar = true): self
    {
        self::$useAvatar = $useAvatar;

        return $this;
    }

    public static function hasAvatar(): bool
    {
        return self::$useAvatar;
    }

    public function register(Panel $panel): void
    {
        if (! config('filament-users.publish_resource')) {
            $panel->resources([
                UserResource::class,
            ]);
        }

        if (config('filament-users.teams')) {
            $panel->resources([
                TeamResource::class,
            ]);
        }
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): self
    {
        return new FilamentUsersPlugin;
    }
}
