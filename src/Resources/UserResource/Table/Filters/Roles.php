<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Tables;

class Roles extends Filter
{
    public static function make(): Tables\Filters\SelectFilter
    {
        return Tables\Filters\SelectFilter::make('roles')
            ->label(trans('filament-users::user.resource.roles'))
            ->multiple()
            ->searchable()
            ->preload()
            ->relationship('roles', 'name');
    }
}
