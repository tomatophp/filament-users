<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;

class Email extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('email')
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.email'));
    }
}
