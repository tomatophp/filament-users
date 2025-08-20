<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Columns;

use Filament\Tables;

class Avatar extends Column
{
    public static function make(): Tables\Columns\ImageColumn
    {
        return Tables\Columns\ImageColumn::make('profile_photo_path')
            ->default(function ($record) {
                $default = 'identicon';
                $size = 100;
                $grav_url = 'https://www.gravatar.com/avatar/' . hash('sha256', strtolower(trim($record->email))) . '?d=' . urlencode($default) . '&s=' . $size;

                return $grav_url;
            })
            ->label(trans('filament-users::user.resource.avatar'))
            ->circular();
    }
}
