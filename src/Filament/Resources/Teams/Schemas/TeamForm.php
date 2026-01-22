<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')
                ->label(trans('filament-users::user.team.columns.name'))
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('user_id')
                ->label(trans('filament-users::user.team.columns.owner'))
                ->relationship('owner', 'name')
                ->required()
                ->preload()
                ->searchable(),
            Forms\Components\Toggle::make('personal_team')->label(trans(
                'filament-users::user.team.columns.personal_team',
            )),
        ]);
    }
}
