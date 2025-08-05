<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms;

class Avatar extends Component
{
    /**
     * @return Avatar
     */
    public static function make(): Forms\Components\FileUpload
    {
        return Forms\Components\FileUpload::make('profile_photo_path')
            ->label(trans('filament-users::user.resource.avatar'))
            ->columnSpanFull()
            ->alignCenter()
            ->image()
            ->avatar()
            ->imageEditor()
            ->imageEditorAspectRatios([
                '16:9',
                '4:3',
                '1:1',
            ]);
    }
}
