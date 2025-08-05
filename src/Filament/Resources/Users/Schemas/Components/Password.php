<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class Password extends Component
{
    /**
     * @return TextInput
     */
    public static function make(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('password')
            ->hidden(fn ($record) => $record)
            ->label(trans('filament-users::user.resource.password'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required(fn ($record) => ! $record)
            ->rule(\Illuminate\Validation\Rules\Password::default())
            ->dehydrated(fn ($state) => filled($state))
            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::pages/auth/register.form.password.validation_attribute'));
    }
}
