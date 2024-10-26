<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

class ImpersonateAction extends Action
{
    /**
     * @return Action
     */
    public static function make(): \Filament\Actions\Action
    {
        if (class_exists('\STS\FilamentImpersonate\Pages\Actions\Impersonate')) {
            return \STS\FilamentImpersonate\Pages\Actions\Impersonate::make();
        }

        return \Filament\Actions\Action::make('impersonate');
    }
}
