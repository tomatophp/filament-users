<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;

class UpdatedAt extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('updated_at')
            ->label(trans('filament-users::user.resource.updated_at'))
            ->dateTime()
            ->description(fn($record) => $record->updated_at->diffForHumans())
            ->toggleable(isToggledHiddenByDefault: true)
            ->sortable();
    }
}
