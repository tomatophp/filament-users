<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables;

class Teams extends Column
{
    public static function make(): Tables\Columns\TextColumn
    {
        return Tables\Columns\TextColumn::make('teams.name')
            ->color('info')
            ->icon('heroicon-o-users')
            ->toggleable()
            ->badge();
    }
}
