<?php

namespace TomatoPHP\FilamentUsers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TomatoPHP\FilamentUsers\Services\FilamentUserServices
 *
 * @method static void register(array|string $relation)
 * @method static array getRelations()
 * @method static string getModel()
 */
class FilamentUser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-user';
    }
}
