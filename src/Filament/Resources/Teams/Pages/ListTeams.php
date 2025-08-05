<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages;

use TomatoPHP\FilamentUsers\Filament\Resources\Teams\TeamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTeams extends ListRecords
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
