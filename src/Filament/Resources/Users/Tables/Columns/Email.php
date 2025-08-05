<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;

class Email extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return config('filament-users.styled_columns') ? Tables\Columns\TextColumn::make('email')
            ->icon('heroicon-o-envelope')
            ->color('primary')
            ->badge()
            ->url(fn ($record) => "mailto:{$record->email}")
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.email'))
        : Tables\Columns\TextColumn::make('email')
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.email'));
    }
}
