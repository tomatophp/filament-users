<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

abstract class Action
{
    abstract public static function make(): \Filament\Actions\Action;
}
