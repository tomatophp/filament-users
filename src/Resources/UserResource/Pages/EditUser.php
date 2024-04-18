<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Pages;

use App\Models\User;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\DeleteAction;
use STS\FilamentImpersonate\Pages\Actions\Impersonate;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    public function mutateFormDataBeforeSave(array $data): array
    {
        $getUser = User::where('email', $data['email'])->first();
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
        if(class_exists( \STS\FilamentImpersonate\Pages\Actions\Impersonate::class) && config('filament-users.impersonate')){
            if(config('filament-users.impersonate')){
                $actions[] = \STS\FilamentImpersonate\Pages\Actions\Impersonate::make()->record($this->getRecord());
            }
        }

        $actions[] = DeleteAction::make();


        return array_merge($actions, FilamentUser::getEditActions());
    }
}
