<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Filament\Actions;

class CreateAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\CreateAction::make();
    }
}
