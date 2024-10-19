<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.create');
    }

    protected function getHeaderActions(): array
    {
        return UserResource\Actions\CreatePageActions::make();
    }
}
