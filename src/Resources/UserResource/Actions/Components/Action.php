<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Illuminate\Database\Eloquent\Model;

abstract class Action
{
    abstract public static function make(?Model $record = null): \Filament\Actions\Action;
}
