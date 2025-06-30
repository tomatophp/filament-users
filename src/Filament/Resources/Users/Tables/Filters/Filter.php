<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Filters;

abstract class Filter
{
    abstract public static function make(): \Filament\Tables\Filters\BaseFilter;
}
