<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\PageRegistration;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\RelationManagers\RelationManagerConfiguration;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\UserInfoList;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable;

class UserResource extends Resource
{
    protected static ?int $navigationSort = 9;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function getModel(): string
    {
        return config('filament-users.model');
    }

    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getPluralLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    public static function getLabel(): string
    {
        return trans('filament-users::user.resource.single');
    }

    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.resource');
    }

    public static function form(Form $form): Form
    {
        return UserForm::make($form);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return UserInfoList::make($infolist);
    }

    public static function table(Table $table): Table
    {
        return UserTable::make($table);
    }

    /**
     * @return array|\class-string[]|RelationGroup[]|RelationManagerConfiguration[]
     */
    public static function getRelations(): array
    {
        return FilamentUser::getRelations();
    }

    /**
     * @return array|PageRegistration[]
     */
    public static function getPages(): array
    {
        return config('filament-users.simple') ? [
            'index' => Pages\ManageUsers::route('/'),
        ] : [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
