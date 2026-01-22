<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages\CreateTeam;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages\EditTeam;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages\ListTeams;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Pages\ViewTeam;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Schemas\TeamForm;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Schemas\TeamInfolist;
use TomatoPHP\FilamentUsers\Filament\Resources\Teams\Tables\TeamsTable;

class TeamResource extends Resource
{
    protected static string | BackedEnum | null $navigationIcon = Heroicon::UserGroup;

    public static function getModel(): string
    {
        return config('filament-users.team_model');
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function getLabel(): ?string
    {
        return trans('filament-users::user.team.single');
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.team.title');
    }

    public static function getPluralLabel(): ?string
    {
        return trans('filament-users::user.team.title');
    }

    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?? trans('filament-users::user.group');
    }

    public static function form(Schema $schema): Schema
    {
        return TeamForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TeamInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TeamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTeams::route('/'),
            'create' => CreateTeam::route('/create'),
            'view' => ViewTeam::route('/{record}'),
            'edit' => EditTeam::route('/{record}/edit'),
        ];
    }
}
