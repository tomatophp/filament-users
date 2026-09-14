<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Filters;

use Filament\Tables\Filters\BaseFilter;

abstract class Filter
{
    abstract public static function make(): BaseFilter;
}
