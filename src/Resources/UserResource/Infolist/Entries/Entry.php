<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;

abstract class Entry
{
    abstract public static function make(): \Filament\Infolists\Components\Entry;
}
