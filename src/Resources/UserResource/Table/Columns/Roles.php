<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class Roles extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('roles.name')
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->toggleable()
            ->badge();
    }
}
