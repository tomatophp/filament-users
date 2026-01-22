<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

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
