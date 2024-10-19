<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\Entries;


abstract class Entry
{
    /**
     * @return \Filament\Infolists\Components\Entry
     */
    public abstract static function make(): \Filament\Infolists\Components\Entry;
}
