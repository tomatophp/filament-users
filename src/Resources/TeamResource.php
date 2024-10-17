<?php

namespace TomatoPHP\FilamentUsers\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use TomatoPHP\FilamentUsers\Resources\TeamResource\Pages;

class TeamResource extends Resource
{
    public static function getModel(): string
    {
        return config('filament-users.team_model');
    }

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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

        return config('filament-users.group') ?: trans('filament-users::user.group');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //                Forms\Components\SpatieMediaLibraryFileUpload::make('avatar')
                //                    ->label(trans('filament-users::user.team.columns.avatar'))
                //                    ->hiddenLabel()
                //                    ->alignCenter()
                //                    ->avatar()
                //                    ->collection('avatar')
                //                    ->image(),
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
                Forms\Components\Toggle::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team')),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        $columns = [];

        if (filament('filament-user')::hasAvatar()) {
            $columns[] = Tables\Columns\TextColumn::make('owner.name')
                ->label(trans('filament-users::user.team.columns.owner'))
                ->sortable();
        } else {
            $columns[] = Tables\Columns\TextColumn::make('owner.name')
                ->label(trans('filament-users::user.team.columns.owner'))
                ->sortable();
        }

        return $table
            ->columns(array_merge([
                //                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                //                    ->circular()
                //                    ->collection('avatar')
                //                    ->label(trans('filament-users::user.team.columns.avatar'))
                //                    ->toggleable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(trans('filament-users::user.team.columns.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ], $columns))
            ->filters([
                Tables\Filters\SelectFilter::make('owner')
                    ->label(trans('filament-users::user.team.columns.owner'))
                    ->searchable()
                    ->relationship('owner', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->defaultSort('id', 'desc')
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeams::route('/'),
        ];
    }
}
