<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TomatoPHP\FilamentUsers\Services\FilamentUserServices
 *
 * @method static void register(array|string $relation)
 * @method static array getRelations()
 * @method static string getModel()
 * @method static bool isImpersonating()
 * @method static void impersonate(Model $user)
 * @method static void leaveImpersonation()
 * @method static void clearAuthHashes()
 * @method static void guard(string $guard)
 * @method static void redirectTo(string $redirectTo)
 * @method static void backTo(string $backTo)
 */
class FilamentUser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-user';
    }
}
