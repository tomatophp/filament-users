<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

trait AuthorizesRecords
{
    /**
     * Defer to the app's policy for the user model when one exists; apps without a policy keep full access.
     */
    protected static function allows(string $ability, Model $record): bool
    {
        if (Gate::getPolicyFor($record) === null) {
            return true;
        }

        return Gate::allows($ability, $record);
    }
}
