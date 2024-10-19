<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

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
