<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Entries;

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
