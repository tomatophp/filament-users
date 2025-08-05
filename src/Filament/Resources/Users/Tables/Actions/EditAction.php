<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;

class EditAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\EditAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.edit'));
    }
}
