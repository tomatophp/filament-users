<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

abstract class Action
{
    abstract public static function make(): \Filament\Actions\Action;
}
