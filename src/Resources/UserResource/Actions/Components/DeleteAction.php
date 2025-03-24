<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Filament\Actions;
use Filament\Notifications\Notification;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

class DeleteAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\DeleteAction::make('deleteSelectedUser')
            ->using(function ($record, Actions\Action $action) {
                $count = FilamentUser::getModel()::query()->count();
                if ($count === 1) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.last.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.last.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                } elseif (auth()->user()->id === $record->id) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.self.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.self.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                } else {
                    $record->delete();
                    $action->success();
                }
            });
    }
}
