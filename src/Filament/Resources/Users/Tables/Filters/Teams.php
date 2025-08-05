<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Filters;

use Filament\Tables;

class Teams extends Filter
{
    public static function make(): Tables\Filters\SelectFilter
    {
        return Tables\Filters\SelectFilter::make('teams')
            ->label(trans('filament-users::user.resource.teams'))
            ->multiple()
            ->searchable()
            ->preload()
            ->relationship('teams', 'name');
    }
}
