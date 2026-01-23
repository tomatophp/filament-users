<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;

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
                    ->rule(\Illuminate\Validation\Rules\Password::default())
                    ->dehydrated(filled(...))
                    ->same('passwordConfirmation'),
                Forms\Components\TextInput::make('passwordConfirmation')
                    ->label(trans('filament-users::user.resource.password_confirmation'))
                    ->placeholder(trans('filament-users::user.resource.change_password_auto'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required(static fn ($record) => ! $record)
                    ->dehydrated(false),
            ])
            ->action(static function ($record, $data) {
                $auto = ! isset($data['password']);
                $password = $data['password'] ?? Str::random(12);
                $record->password = $password;
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
