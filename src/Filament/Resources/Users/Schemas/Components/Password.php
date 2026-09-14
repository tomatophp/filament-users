<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;

class Password extends Component
{
    public static function make(): TextInput
    {
        return TextInput::make('password')
            ->hidden(static fn ($record) => $record)
            ->label(trans('filament-users::user.resource.password'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required(static fn ($record) => ! $record)
            ->rule(\Illuminate\Validation\Rules\Password::default())
            ->dehydrated(static fn (?string $state): bool => filled($state))
            // Hash::make(...) as a first-class callable is invoked without $state and throws.
            ->dehydrateStateUsing(static fn (string $state): string => Hash::make($state))
            ->same('passwordConfirmation')
            ->validationAttribute(__('filament-panels::pages/auth/register.form.password.validation_attribute'));
    }
}
