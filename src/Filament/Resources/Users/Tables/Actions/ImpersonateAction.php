<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;

class ImpersonateAction extends Action
{
    public static function make(): Actions\Action
    {
        if (class_exists("\STS\FilamentImpersonate\Tables\Actions\Impersonate")) {
            return \STS\FilamentImpersonate\Tables\Actions\Impersonate::make('impersonate')
                ->redirectTo(fn () => filament()->getCurrentPanel()->getUrl())
                ->tooltip(trans('filament-users::user.resource.title.impersonate'));
        }

        return Actions\Action::make('impersonate');
    }
}
