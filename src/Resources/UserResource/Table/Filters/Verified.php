<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table\Filters;

use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class Verified extends Filter
{
    public static function make(): Tables\Filters\Filter
    {
        return Tables\Filters\Filter::make('verified')
            ->form([
                Forms\Components\Toggle::make('verified'),
            ])
            ->label(trans('filament-users::user.resource.verified'))
            ->query(function (Builder $query, array $data): Builder {
                return $query
                    ->when(
                        $data['verified'],
                        fn (Builder $q, $verified) => $verified ? $q->whereNotNull('email_verified_at') : $q->whereNull('email_verified_at')
                    );
            });
    }
}
