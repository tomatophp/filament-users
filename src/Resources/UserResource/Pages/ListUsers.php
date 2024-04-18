<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\CreateAction;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.list');
    }

    protected function getActions(): array
    {
        $actions = [];
        $actions[] = CreateAction::make();

        return array_merge($actions, FilamentUser::getActions());
    }
}
