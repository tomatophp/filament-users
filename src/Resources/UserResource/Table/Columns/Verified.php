<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\IconColumn;

class Verified extends Column
{
    /**
     * @return Tables\Columns\IconColumn
     */
    public static function make(): Tables\Columns\IconColumn
    {
        return Tables\Columns\IconColumn::make('email_verified_at')
            ->state(fn($record) => (bool)$record->email_verified_at)
            ->boolean()
            ->sortable()
            ->label(trans('filament-users::user.resource.email_verified_at'))
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
