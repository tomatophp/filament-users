<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use Filament\Resources\Pages\EditRecord;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function mutateFormDataBeforeSave(array $data): array
    {
        $getUser = FilamentUser::getModel()::where('email', $data['email'])->first();
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
        return config('filament-users.resource.pages.edit')::make($this);
    }
}
