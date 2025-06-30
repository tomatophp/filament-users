<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions;

use Filament\Forms;
use Filament\Actions;
use Illuminate\Database\Eloquent\Collection;

class RolesAction extends Action
{
    public static function make(): Actions\BulkAction
    {
        return Actions\BulkAction::make('roles')
            ->icon('heroicon-o-shield-check')
            ->color('success')
            ->requiresConfirmation()
            ->label(trans('filament-users::user.bulk.roles'))
            ->schema([
                Forms\Components\Select::make('roles')
                    ->label(trans('filament-users::user.resource.roles'))
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(config('filament-users.roles_model')::query()->pluck('name', 'id')->toArray()),
            ])
            ->action(function (array $data, Collection $records, Actions\BulkAction $action) {
                $roles = $data['roles'];

                $records->each(function ($user) use ($roles) {
                    $user->roles()->sync($roles);
                });

                $action->success();
            })
            ->deselectRecordsAfterCompletion();
    }
}
