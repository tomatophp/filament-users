<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions;

use Filament\Notifications\Notification;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;

class DeleteAction extends Action
{
    public static function make(): Tables\Actions\DeleteBulkAction
    {
        return Tables\Actions\DeleteBulkAction::make()
            ->using(function ($records, Tables\Actions\BulkAction $action) {
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
