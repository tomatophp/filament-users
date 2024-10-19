<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class Email extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('email')
            ->sortable()
            ->searchable()
            ->label(trans('filament-users::user.resource.email'));
    }
}
