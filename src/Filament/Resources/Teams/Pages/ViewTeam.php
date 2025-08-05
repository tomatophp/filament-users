<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages;

use TomatoPHP\FilamentUsers\Filament\Resources\Teams\TeamResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTeam extends ViewRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
