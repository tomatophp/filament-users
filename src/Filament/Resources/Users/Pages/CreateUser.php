<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;

use TomatoPHP\FilamentUsers\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;


    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.create');
    }
}
