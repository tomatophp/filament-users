<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

abstract class Column
{
    abstract public static function make(): \Filament\Tables\Columns\Column;
}
