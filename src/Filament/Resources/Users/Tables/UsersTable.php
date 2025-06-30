<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Column;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class UsersTable
{
    protected static array $columns = [];

    public static function configure(Table $table): Table
    {
        return $table
            ->columns(static::getDefaultColumns())
            ->filters(UserFilters::make())
            ->recordActions(UserActions::make())
            ->toolbarActions(UserBulkActions::make());
    }

    public static function getDefaultColumns(): array
    {
        return [
            Columns\ID::make(),
            Columns\Name::make(),
            Columns\Email::make(),
            Columns\Verified::make(),
            Columns\CreatedAt::make(),
            Columns\UpdatedAt::make(),
        ];
    }

    private static function getColumns(): array
    {
        return array_merge(self::getDefaultColumns(), self::$columns);
    }

    public static function register(Column | array $column): void
    {
        if (is_array($column)) {
            foreach ($column as $item) {
                if ($item instanceof Column) {
                    self::$columns[] = $item;
                }
            }
        } else {
            self::$columns[] = $column;
        }
    }
}
