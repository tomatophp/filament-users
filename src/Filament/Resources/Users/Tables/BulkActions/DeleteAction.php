<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions;

use Filament\Actions;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

class DeleteAction extends Action
{
    public static function make(): Actions\DeleteBulkAction
    {
        return Actions\DeleteBulkAction::make()
            ->using(function ($records, Actions\BulkAction $action) {
                foreach ($records as $record) {
                    self::checkIfLastUserOrCurrentUser($record);
                }

                $action->success();
                $action->deselectRecordsAfterCompletion();
            });
    }

    private static function checkIfLastUserOrCurrentUser(Model $record): void
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
        }
    }
}
