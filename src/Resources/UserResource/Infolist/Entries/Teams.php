<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists;

class Teams extends Entry
{
    public static function make(): Infolists\Components\TextEntry
    {
        return Infolists\Components\TextEntry::make('teams.name')
            ->visible(fn ($record) => $record->teams->isNotEmpty())
            ->columnSpanFull()
            ->badge()
            ->color('info')
            ->icon('heroicon-o-users')
            ->label(trans('filament-users::user.resource.teams'));
    }
}
