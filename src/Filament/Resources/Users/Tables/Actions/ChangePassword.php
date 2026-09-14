<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\Action::make('changePassword')
            ->requiresConfirmation()
            ->color('danger')
            ->icon('heroicon-o-key')
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.change_password'))
            ->label(trans('filament-users::user.resource.change_password'))
            ->schema([
                Forms\Components\TextInput::make('password')
                    ->label(trans('filament-users::user.resource.password'))
                    ->placeholder(trans('filament-users::user.resource.change_password_auto'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required(static fn ($record) => ! $record)
                    ->rule(Password::default())
                    // filled(...) as a first-class callable is invoked without $state, so the field was never dehydrated.
                    ->dehydrated(static fn (?string $state): bool => filled($state))
                    ->same('passwordConfirmation'),
                Forms\Components\TextInput::make('passwordConfirmation')
                    ->label(trans('filament-users::user.resource.password_confirmation'))
                    ->placeholder(trans('filament-users::user.resource.change_password_auto'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required(static fn ($record) => ! $record)
                    ->dehydrated(false),
            ])
            ->action(static function ($record, array $data) {
                $auto = blank($data['password'] ?? null);
                $password = $auto ? Str::random(12) : $data['password'];
                $record->password = Hash::make($password);
                $record->save();

                Notification::make()
                    ->title(trans('filament-users::user.resource.change_password'))
                    ->body(
                        $auto
                            ? trans('filament-users::user.resource.change_password_auto') . ' [' . $password . ']'
                            : trans('filament-users::user.resource.change_password_success'),
                    )
                    ->success()
                    ->send();
            });
    }
}
