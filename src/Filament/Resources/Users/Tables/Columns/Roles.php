<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;

class Roles extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('roles.name')
            ->formatStateUsing(fn ($state) => str($state)->replace('_', ' ')->replace('-', ' ')->title())
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->toggleable()
            ->badge()
            ->label(trans('filament-users::user.resource.roles'));
    }
}
