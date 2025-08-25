<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas\Components;

use Filament\Forms;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class Avatar extends Component
{
    /**
     * @return Avatar
     */
    public static function make(): Field
    {
        if (
            (in_array("Spatie\MediaLibrary\InteractsWithMedia", class_uses(config('filament-users.model')))) ||
            (in_array("TomatoPHP\FilamentSaasPanel\Traits\InteractsWithTenant", class_uses(config('filament-users.model'))))
        ) {
            return SpatieMediaLibraryFileUpload::make(config('filament-users.avatar_collection'))
                ->label(trans('filament-users::user.resource.avatar'))
                ->columnSpanFull()
                ->alignCenter()
                ->image()
                ->collection(config('filament-users.avatar_collection'))
                ->avatar()
                ->imageEditor()
                ->imageEditorAspectRatios([
                    '16:9',
                    '4:3',
                    '1:1',
                ]);
        } else {
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
}
