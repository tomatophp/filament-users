<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

abstract class Action
{
    abstract public static function make(): \Filament\Tables\Actions\Action;
}
