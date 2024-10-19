<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

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
