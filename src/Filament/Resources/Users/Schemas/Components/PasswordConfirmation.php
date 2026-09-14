<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms\Components\TextInput;

class PasswordConfirmation extends Component
{
    public static function make(): TextInput
    {
        return TextInput::make('passwordConfirmation')
            ->hidden(static fn ($record): mixed => $record)
            ->label(trans('filament-users::user.resource.password_confirmation'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required(static fn ($record) => ! $record)
            ->dehydrated(false);
    }
}
