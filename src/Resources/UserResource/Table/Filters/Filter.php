<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Tables\Filters\BaseFilter;

abstract class Filter
{
    /**
     * @return \Filament\Tables\Filters\BaseFilter
     */
    public abstract static function make(): \Filament\Tables\Filters\BaseFilter;
}
