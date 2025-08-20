<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Teams\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class TeamsTable
{
    public static function configure(Table $table): Table
    {
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
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(trans('filament-users::user.team.columns.name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('personal_team')
                    ->label(trans('filament-users::user.team.columns.personal_team'))
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(trans('filament-users::user.resource.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(trans('filament-users::user.resource.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('owner')
                    ->label(trans('filament-users::user.team.columns.owner'))
                    ->searchable()
                    ->relationship('owner', 'name'),
            ])
            ->recordActions([
                ViewAction::make()->iconButton()->tooltip(__('filament-actions::view.single.label')),
                EditAction::make()->iconButton()->tooltip(__('filament-actions::edit.single.label')),
            ])
            ->defaultSort('id', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
