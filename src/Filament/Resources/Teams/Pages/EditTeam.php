<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages;

use TomatoPHP\FilamentUsers\Filament\Resources\Teams\TeamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
