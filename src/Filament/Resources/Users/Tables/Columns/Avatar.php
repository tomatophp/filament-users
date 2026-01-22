<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class Avatar extends Column
{
    public static function make(): Tables\Columns\Column
    {
        if (
            in_array("Spatie\MediaLibrary\InteractsWithMedia", class_uses(config('filament-users.model')), strict: true)
            || in_array(
                "TomatoPHP\FilamentSaasPanel\Traits\InteractsWithTenant",
                class_uses(config('filament-users.model')),
                strict: true,
            )
        ) {
            return SpatieMediaLibraryImageColumn::make(config('filament-users.avatar_collection'))
                ->collection(config('filament-users.avatar_collection'))
                ->label(trans('filament-users::user.resource.avatar'))
                ->default(static function ($record) {
                    $default = 'identicon';
                    $size = 100;

                    return
                        'https://www.gravatar.com/avatar/'
                        . hash('sha256', strtolower(trim($record->email)))
                        . '?d='
                        . urlencode($default)
                        . '&s='
                        . $size;
                })
                ->circular();
        }

        return Tables\Columns\ImageColumn::make('profile_photo_path')
            ->default(static function ($record) {
                $default = 'identicon';
                $size = 100;

                return
                    'https://www.gravatar.com/avatar/'
                    . hash('sha256', strtolower(trim($record->email)))
                    . '?d='
                    . urlencode($default)
                    . '&s='
                    . $size;
            })
            ->label(trans('filament-users::user.resource.avatar'))
            ->circular();
    }
}
