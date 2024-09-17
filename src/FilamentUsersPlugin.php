<?php

namespace TomatoPHP\FilamentUsers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Nwidart\Modules\Module;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class FilamentUsersPlugin implements Plugin
{
    private bool $isActive = false;

    public function getId(): string
    {
        return 'filament-user';
    }

    public function register(Panel $panel): void
    {
        if(class_exists(Module::class)){
            if(\Nwidart\Modules\Facades\Module::find('FilamentUsers')?->isEnabled()){
                $this->isActive = true;
            }
        }
        else {
            $this->isActive = true;
        }

        if($this->isActive) {
            if (!config('filament-users.publish_resource')) {
                $panel->resources([
                    UserResource::class,
                ]);
            }
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
