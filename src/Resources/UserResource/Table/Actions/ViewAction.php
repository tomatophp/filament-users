<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use Filament\Tables;

class ViewAction extends Action
{
    public static function make(): Tables\Actions\Action
    {
        return Tables\Actions\ViewAction::make()
            ->iconButton()
            ->tooltip(trans('filament-users::user.resource.title.show'));
    }
}
