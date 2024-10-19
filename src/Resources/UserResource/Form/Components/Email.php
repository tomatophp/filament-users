<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms;
use Filament\Forms\Components\TextInput;

class Email extends Component
{
    /**
     * @return TextInput
     */
    public static function make(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('email')
            ->email()
            ->required()
            ->label(trans('filament-users::user.resource.email'));
    }
}
