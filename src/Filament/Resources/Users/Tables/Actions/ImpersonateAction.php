<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions;

use Filament\Actions;
use Filament\Support\Concerns\EvaluatesClosures;
use TomatoPHP\FilamentUsers\Concerns\Impersonates;

class ImpersonateAction extends Action
{
    use EvaluatesClosures;
    use Impersonates;

    public static function make(): Actions\Action
    {
        (new self)->guard(config('filament-users.impersonate.auth_guard'));
        (new self)->redirectTo(config('filament-users.impersonate.redirect_to'));
        (new self)->backTo(config('filament-users.impersonate.back_to'));

        return Actions\Action::make('impersonate')
            ->iconButton()
            ->requiresConfirmation()
            ->icon('heroicon-o-user-circle')
            ->color('info')
            ->tooltip(trans('filament-users::user.resource.title.impersonate'))
            ->label(trans('filament-users::user.resource.title.impersonate'))
            ->action(fn ($record) => (new self)->impersonate($record))
            ->hidden(fn ($record) => ! (new self)->canBeImpersonated($record));
    }
}
