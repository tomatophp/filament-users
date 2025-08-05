<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;

class ViewAction extends Action
{
    public static function make(): Actions\Action
    {
        return Actions\ViewAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.show'));
    }
}
