<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Actions;

use Filament\Tables;

class ImpersonateAction extends Action
{
    public static function make(): Tables\Actions\Action
    {
        return \STS\FilamentImpersonate\Tables\Actions\Impersonate::make('impersonate')
            ->redirectTo(fn () => filament()->getCurrentPanel()->getUrl())
            ->tooltip(trans('filament-users::user.resource.title.impersonate'));
    }
}
