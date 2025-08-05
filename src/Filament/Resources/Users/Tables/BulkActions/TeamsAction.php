<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions;

use Filament\Actions;
use Filament\Forms;
use Illuminate\Database\Eloquent\Collection;

class TeamsAction extends Action
{
    public static function make(): Actions\BulkAction
    {
        return Actions\BulkAction::make('teams')
            ->requiresConfirmation()
            ->color('info')
            ->icon('heroicon-o-users')
            ->label(trans('filament-users::user.bulk.teams'))
            ->schema([
                Forms\Components\Select::make('teams')
                    ->label(trans('filament-users::user.resource.teams'))
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(config('filament-users.team_model')::query()->pluck('name', 'id')->toArray()),
            ])
            ->action(function (array $data, Collection $records, Actions\BulkAction $action) {
                $teams = $data['teams'];

                $records->each(function ($user) use ($teams) {
                    $user->teams()->sync($teams);
                });

                $action->success();
            })
            ->deselectRecordsAfterCompletion();
    }
}
