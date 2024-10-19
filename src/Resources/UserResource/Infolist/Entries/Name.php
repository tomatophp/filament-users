<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

use Filament\Infolists;

class Name extends Entry
{
    public static function make(): Infolists\Components\TextEntry
    {
        return Infolists\Components\TextEntry::make('name')
            ->columnSpanFull()
            ->label(trans('filament-users::user.resource.name'));
    }
}
