<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;

class Name extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('name')
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.name'));
    }
}
