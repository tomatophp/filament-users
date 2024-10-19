<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\TextInput;

class Name extends Component
{
    /**
     * @return TextInput
     */
    public static function make(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('name')
            ->required()
            ->label(trans('filament-users::user.resource.name'));
    }
}
