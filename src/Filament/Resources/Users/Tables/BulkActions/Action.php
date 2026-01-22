<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions;

use Filament\Actions\BulkAction;

abstract class Action
{
    abstract public static function make(): BulkAction;
}
