<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Filament\Actions;
use Filament\Notifications\Notification;

class DeleteAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\DeleteAction::make('deleteSelectedUser')
            ->using(function ($record, Actions\Action $action) {
                $count = self::getModel()::query()->count();
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

    public static function getModel(): string
    {
        // Get the configuration value
        $config = config('filament-users.model');

        // Check if the configuration is an array
        if (is_array($config)) {
            // Get the ID from filament()
            $id = filament()->getId();

            // Check if the key exists in the array
            if (isset($config[$id])) {
                $model = $config[$id];
            } else {
                // If the key does not exist, return the first element of the array
                $model = reset($config);
            }
        } else {
            // If the configuration is not an array, use it as the model
            $model = $config;
        }

        // Ensure the model class exists
        if (!class_exists($model)) {
            throw new \RuntimeException("Model class {$model} does not exist.");
        }

        // Return the model class name (or you can return the count if needed)
        return $model;
    }
}
