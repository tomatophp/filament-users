<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\TeamResource;

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
