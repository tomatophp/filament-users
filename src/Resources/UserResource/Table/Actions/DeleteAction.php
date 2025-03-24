<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use Filament\Notifications\Notification;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

class DeleteAction extends Action
{
    public static function make(): Tables\Actions\Action
    {
        return Tables\Actions\DeleteAction::make()
            ->using(function (Model $record, Tables\Actions\Action $action) {
                self::checkIfLastUserOrCurrentUser($record, $action);
            })
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.delete'));
    }

    private static function checkIfLastUserOrCurrentUser(Model $record, Tables\Actions\Action $action): void
    {
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
    }
}
