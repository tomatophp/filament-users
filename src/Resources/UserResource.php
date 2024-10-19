<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\PageRegistration;
use Filament\Resources\RelationManagers\RelationGroup;
use Filament\Resources\RelationManagers\RelationManagerConfiguration;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laravel\Jetstream\Jetstream;
use TomatoPHP\FilamentUsers\Facades\FilamentUser;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\UserInfoList;
use TomatoPHP\FilamentUsers\Resources\UserResource\Pages;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable;

class UserResource extends Resource
{

    /**
     * @var int|null
     */
    protected static ?int $navigationSort = 9;

    /**
     * @var string|null
     */
    protected static ?string $navigationIcon = 'heroicon-o-user';

    /**
     * @return string
     */
    public static function getModel(): string
    {
        return config('filament-users.model');
    }

    /**
     * @return string
     */
    public static function getNavigationLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    /**
     * @return string
     */
    public static function getPluralLabel(): string
    {
        return trans('filament-users::user.resource.label');
    }

    /**
     * @return string
     */
    public static function getLabel(): string
    {
        return trans('filament-users::user.resource.single');
    }

    /**
     * @return string|null
     */
    public static function getNavigationGroup(): ?string
    {
        if (config('filament-users.shield')) {
            return __('filament-shield::filament-shield.nav.group');
        }

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return trans('filament-users::user.resource.title.resource');
    }

    /**
     * @param Form $form
     * @return Form
     */
    public static function form(Form $form): Form
    {
        return UserForm::make($form);
    }

    /**
     * @param Infolist $infolist
     * @return Infolist
     */
    public static function infolist(Infolist $infolist): Infolist
    {
        return UserInfoList::make($infolist);
    }

    /**
     * @param Table $table
     * @return Table
     */
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
