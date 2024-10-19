<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class ID extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('id')
            ->sortable()
            ->label(trans('filament-users::user.resource.id'));
    }
}
