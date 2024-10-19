<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class Teams extends Column
{
    /**
     * @return Tables\Columns\TextColumn
     */
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('teams.name')
                ->color('info')
                ->icon('heroicon-o-users')
                ->toggleable()
                ->badge();
    }
}
