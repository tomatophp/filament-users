<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make()->using(static function ($record, Action $action) {
                $count = FilamentUser::getModel()::query()->count();
                if ($count === 1) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.last.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.last.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                }

                if (auth()->user()->id === $record->id) {
                    Notification::make()
                        ->title(trans('filament-users::user.resource.notificaitons.self.title'))
                        ->body(trans('filament-users::user.resource.notificaitons.self.body'))
                        ->danger()
                        ->icon('heroicon-o-exclamation-triangle')
                        ->send();

                    return;
                }

                $record->delete();
                $action->success();

                return redirect()->to(UserResource::getUrl('index'));
            }),
        ];
    }
}
