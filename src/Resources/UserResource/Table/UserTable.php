<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use Filament\Tables\Columns\Column;
use Filament\Tables\Table;

class UserTable
{
    protected static array $columns = [];

    public static function make(Table $table): Table
    {
        return $table
            ->deferLoading()
            ->bulkActions(config('filament-users.resource.table.bulkActions')::make())
            ->actions(config('filament-users.resource.table.actions')::make())
            ->filters(config('filament-users.resource.table.filters')::make())
            ->columns(self::getColumns());
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
