<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;

class CreatedAt extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('created_at')
            ->label(trans('filament-users::user.resource.created_at'))
            ->dateTime()
            ->description(fn($record) => $record->created_at->diffForHumans())
            ->toggleable(isToggledHiddenByDefault: true)
            ->sortable();
    }
}
