<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms\Components\Select;

class Teams extends Component
{
    public static function make(): Select
    {
        return Select::make('teams')
            ->columnSpanFull()
            ->multiple()
            ->preload()
            ->relationship('teams', 'name')
            ->label(trans('filament-users::user.resource.teams'));
    }
}
