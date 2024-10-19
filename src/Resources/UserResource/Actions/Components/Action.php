<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Illuminate\Database\Eloquent\Model;

abstract class Action
{

    /**
     * @param Model|null $record
     * @return \Filament\Actions\Action
     */
    public abstract static function make(?Model $record = null): \Filament\Actions\Action;
}
