<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

abstract class Action
{
    /**
     * @return \Filament\Tables\Actions\Action
     */
    public abstract static function make(): \Filament\Tables\Actions\Action;
}
