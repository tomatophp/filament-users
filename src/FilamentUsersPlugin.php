<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Laravel\Jetstream\Jetstream;
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
        if (config('filament-users.shield') && class_exists(\BezhanSalleh\FilamentShield\FilamentShield::class)) {
            UserResource\Form\UserForm::register(UserResource\Form\Components\Roles::make());
            UserResource\Table\UserTable::register(UserResource\Table\Columns\Roles::make());
            UserResource\Table\UserFilters::register(UserResource\Table\Filters\Roles::make());
            UserResource\Table\UserBulkActions::register(UserResource\Table\BulkActions\RolesAction::make());
            UserResource\Infolist\UserInfoList::register(UserResource\Infolist\Entries\Roles::make());
        }

        if (config('filament-users.teams') && class_exists(Jetstream::class)) {
            UserResource\Form\UserForm::register(UserResource\Form\Components\Teams::make());
            UserResource\Table\UserTable::register(UserResource\Table\Columns\Teams::make());
            UserResource\Table\UserFilters::register(UserResource\Table\Filters\Teams::make());
            UserResource\Table\UserBulkActions::register(UserResource\Table\BulkActions\TeamsAction::make());
            UserResource\Infolist\UserInfoList::register(UserResource\Infolist\Entries\Teams::make());
        }

        if (config('filament-users.impersonate') && class_exists(\STS\FilamentImpersonate\Tables\Actions\Impersonate::class)) {
            UserResource\Table\UserActions::register(UserResource\Table\Actions\ImpersonateAction::make());
        }
    }

    public static function make(): self
    {
        return new FilamentUsersPlugin;
    }
}
