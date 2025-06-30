<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Entries;

abstract class Entry
{
    abstract public static function make(): \Filament\Infolists\Components\Entry;
}
