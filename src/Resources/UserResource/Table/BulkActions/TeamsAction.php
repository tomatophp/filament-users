<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;

class TeamsAction extends Action
{
    public static function make(): Tables\Actions\BulkAction
    {
        return Tables\Actions\BulkAction::make('teams')
            ->requiresConfirmation()
            ->color('info')
            ->icon('heroicon-o-users')
            ->label(trans('filament-users::user.bulk.teams'))
            ->form([
                Forms\Components\Select::make('teams')
                    ->label(trans('filament-users::user.resource.teams'))
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(config('filament-users.team_model')::query()->pluck('name', 'id')->toArray()),
            ])
            ->action(function (array $data, Collection $records, Tables\Actions\BulkAction $action) {
                $teams = $data['teams'];

                $records->each(function ($user) use ($teams) {
                    $user->teams()->sync($teams);
                });

                $action->success();
            })
            ->deselectRecordsAfterCompletion();
    }
}
