<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class ManageUsers extends ManageRecords
{
    protected static string $resource = UserResource::class;

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.list');
    }

    protected function getActions(): array
    {
       return UserResource\Actions\ManageUserActions::make();
    }
}
