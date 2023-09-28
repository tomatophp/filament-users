<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use TomatoPHP\FilamentUsers\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function getTitle(): string
    {
        return trans('filament-user::user.resource.title.create');
    }
}
