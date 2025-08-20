<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams;
use TomatoPHP\FilamentUsers\Filament\Resources\Users;

class FilamentUsersPlugin implements Plugin
{
    protected static bool $useAvatar = false;

    protected static bool $useUserResource = true;

    protected static bool $useTeamsResource = true;

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

    public function useUserResource(bool $useUserResource = true): self
    {
        self::$useUserResource = $useUserResource;

        return $this;
    }

    public function hasUserResource(): bool
    {
        return self::$useUserResource;
    }

    public function useTeamsResource(bool $useTeamsResource = true): self
    {
        self::$useTeamsResource = $useTeamsResource;

        return $this;
    }

    public function hasTeamsResource(): bool
    {
        return self::$useTeamsResource;
    }

    public function register(Panel $panel): void
    {
        if (self::$useUserResource) {
            $panel->resources([
                Users\UserResource::class,
            ]);
        }

        if (config('filament-users.teams') && self::$useTeamsResource) {
            $panel->resources([
                Teams\TeamResource::class,
            ]);
        }
    }

    public function boot(Panel $panel): void
    {
        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            Users\Schemas\UserForm::register(Users\Schemas\Components\Roles::make());
            Users\Tables\UsersTable::register(Users\Tables\Columns\Roles::make());
            Users\Tables\UserFilters::register(Users\Tables\Filters\Roles::make());
            Users\Tables\UserBulkActions::register(Users\Tables\BulkActions\RolesAction::make());
            Users\Schemas\UserInfolist::register(Users\Schemas\Entries\Roles::make());
        }

        if (config('filament-users.teams') && class_exists(\Laravel\Jetstream\Team::class)) {
            Users\Schemas\UserForm::register(Users\Schemas\Components\Teams::make());
            Users\Tables\UsersTable::register(Users\Tables\Columns\Teams::make());
            Users\Tables\UserFilters::register(Users\Tables\Filters\Teams::make());
            Users\Tables\UserBulkActions::register(Users\Tables\BulkActions\TeamsAction::make());
            Users\Schemas\UserInfolist::register(Users\Schemas\Entries\Teams::make());
        }

        if (config('filament-users.impersonate.enabled')) {
            Users\Tables\UserActions::register(Users\Tables\Actions\ImpersonateAction::make());
        }
    }

    public static function make(): self
    {
        return new FilamentUsersPlugin;
    }
}
