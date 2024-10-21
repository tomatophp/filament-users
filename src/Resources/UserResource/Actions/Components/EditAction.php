<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages\EditUser;

class EditAction extends Action
{
    public static function make(?Model $record = null): Actions\Action
    {
        return Actions\Action::make('edit')
            ->url(EditUser::getUrl(['record' => $record]));
    }
}
