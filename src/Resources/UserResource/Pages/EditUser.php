<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function mutateFormDataBeforeSave(array $data): array
    {
        $getUser = config('filament-users.model')::where('email', $data['email'])->first();
        if ($getUser) {
            if (empty($data['password'])) {
                $data['password'] = $getUser->password;
            }
        }

        return $data;
    }

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.edit');
    }

    protected function getActions(): array
    {
        $actions = [];
        if (class_exists(\STS\FilamentImpersonate\Pages\Actions\Impersonate::class) && config('filament-users.impersonate')) {
            if (config('filament-users.impersonate')) {
                $actions[] = \STS\FilamentImpersonate\Pages\Actions\Impersonate::make()->record($this->getRecord());
            }
        }

        $actions[] = DeleteAction::make('deleteSelectedUser')->using(function ($record, Action $action) {
            $count = config('filament-users.model')::query()->count();
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

        return array_merge($actions, FilamentUser::getEditActions());
    }
}
