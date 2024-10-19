<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists;

class Roles extends Entry
{
    public static function make(): Infolists\Components\TextEntry
    {
        return Infolists\Components\TextEntry::make('roles.name')
            ->visible(fn ($record) => $record->roles->isNotEmpty())
            ->columnSpanFull()
            ->badge()
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->label(trans('filament-users::user.resource.roles'));
    }
}
