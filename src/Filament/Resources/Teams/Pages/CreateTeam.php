<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages;

use Filament\Resources\Pages\CreateRecord;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\TeamResource;

class CreateTeam extends CreateRecord
{
    protected static string $resource = TeamResource::class;
}
