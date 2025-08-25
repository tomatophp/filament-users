<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Entries;

use Filament\Infolists;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;

class Avatar extends Entry
{
    public static function make(): Infolists\Components\Entry
    {
        if (
            (in_array("Spatie\MediaLibrary\InteractsWithMedia", class_uses(config('filament-users.model')))) ||
            (in_array("TomatoPHP\FilamentSaasPanel\Traits\InteractsWithTenant", class_uses(config('filament-users.model'))))
        ) {
            return SpatieMediaLibraryImageEntry::make(config('filament-users.avatar_collection'))
                ->collection(config('filament-users.avatar_collection'))
                ->label(trans('filament-users::user.resource.avatar'))
                ->columnSpanFull()
                ->alignCenter()
                ->circular();
        } else {
            return Infolists\Components\ImageEntry::make('profile_photo_path')
                ->default(function ($record) {
                    $default = 'identicon';
                    $size = 100;
                    $grav_url = 'https://www.gravatar.com/avatar/' . hash('sha256', strtolower(trim($record->email))) . '?d=' . urlencode($default) . '&s=' . $size;

                    return $grav_url;
                })
                ->label(trans('filament-users::user.resource.avatar'))
                ->columnSpanFull()
                ->alignCenter()
                ->circular();
        }

    }
}
