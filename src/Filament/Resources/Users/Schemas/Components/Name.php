<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms\Components\TextInput;

class Name extends Component
{
    public static function make(): TextInput
    {
        return TextInput::make('name')->required()->label(trans('filament-users::user.resource.name'));
    }
}
