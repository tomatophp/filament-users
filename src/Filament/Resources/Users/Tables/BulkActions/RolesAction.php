<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions;

use Filament\Actions;
use Filament\Forms;
use Illuminate\Database\Eloquent\Collection;
use TomatoPHP\FilamentUsers\Concerns\AuthorizesRecords;

class RolesAction extends Action
{
    use AuthorizesRecords;

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
            ->action(static function (array $data, Collection $records, Actions\BulkAction $action) {
                $roles = $data['roles'];

                $records
                    ->filter(static fn ($user): bool => self::allows('update', $user))
                    ->each(static function ($user) use ($roles) {
                        $user->roles()->sync($roles);
                    });

                $action->success();
            })
            ->deselectRecordsAfterCompletion();
    }
}
