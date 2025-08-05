<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Entries;

use Filament\Infolists;

class Avatar extends Entry
{
    public static function make(): Infolists\Components\ImageEntry
    {
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
