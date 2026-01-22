<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

abstract class Column
{
    abstract public static function make(): \Filament\Tables\Columns\Column;
}
