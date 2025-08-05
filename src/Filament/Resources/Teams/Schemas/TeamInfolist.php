<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TeamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label(trans('filament-users::user.team.columns.owner'))
                    ->numeric(),
                TextEntry::make('name')
                    ->label(trans('filament-users::user.team.columns.name')),
                IconEntry::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team'))
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label(trans('filament-users::user.resource.created_at')),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->label(trans('filament-users::user.resource.updated_at')),
            ]);
    }
}
