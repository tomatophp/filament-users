<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Components;

use Illuminate\Database\Eloquent\Model;

class ImpersonateAction extends Action
{
    /**
     * @return Action
     */
    public static function make(?Model $record = null): \Filament\Actions\Action
    {
        if (class_exists('\STS\FilamentImpersonate\Pages\Actions\Impersonate')) {
            return \STS\FilamentImpersonate\Pages\Actions\Impersonate::make()->record($record);
        }

        return \Filament\Actions\Action::make('impersonate');
    }
}
