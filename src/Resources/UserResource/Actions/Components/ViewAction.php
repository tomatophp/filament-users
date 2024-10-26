<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Filament\Actions;

class ViewAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\ViewAction::make();
    }
}
