<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Columns;

use Filament\Tables\Columns\TextColumn;

abstract class Column
{
    /**
     * @return \Filament\Tables\Columns\Column
     */
    public static abstract function make(): \Filament\Tables\Columns\Column;
}
