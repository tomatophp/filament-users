<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Entries;

use Filament\Infolists;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;

class Avatar extends Entry
{
    public static function make(): Infolists\Components\Entry
    {
        if (
            in_array("Spatie\MediaLibrary\InteractsWithMedia", class_uses(config('filament-users.model')), strict: true)
            || in_array(
                "TomatoPHP\FilamentSaasPanel\Traits\InteractsWithTenant",
                class_uses(config('filament-users.model')),
                strict: true,
            )
        ) {
            return SpatieMediaLibraryImageEntry::make(config('filament-users.avatar_collection'))
                ->collection(config('filament-users.avatar_collection'))
                ->label(trans('filament-users::user.resource.avatar'))
                ->columnSpanFull()
                ->alignCenter()
                ->circular();
        }

        return Infolists\Components\ImageEntry::make('profile_photo_path')
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
            ->columnSpanFull()
            ->alignCenter()
            ->circular();
    }
}
