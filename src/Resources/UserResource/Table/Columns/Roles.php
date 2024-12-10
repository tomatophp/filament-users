<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;

class Roles extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('roles.name')
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->toggleable()
            ->badge()
            ->label(trans('filament-users::user.resource.roles'));
    }
}
