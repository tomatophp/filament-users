<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\Select;

class Roles extends Component
{
    /**
     * @return Select
     */
    public static function make(): Forms\Components\Select
    {
        return Forms\Components\Select::make('roles')
            ->columnSpanFull()
            ->multiple()
            ->preload()
            ->relationship('roles', 'name')
            ->label(trans('filament-users::user.resource.roles'));
    }
}
