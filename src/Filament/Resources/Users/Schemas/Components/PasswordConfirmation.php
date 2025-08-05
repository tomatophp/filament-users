<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms;
use Filament\Forms\Components\TextInput;

class PasswordConfirmation extends Component
{
    /**
     * @return TextInput
     */
    public static function make(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('passwordConfirmation')
            ->hidden(fn ($record): mixed => $record)
            ->label(trans('filament-users::user.resource.password_confirmation'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required(fn ($record) => ! $record)
            ->dehydrated(false);
    }
}
