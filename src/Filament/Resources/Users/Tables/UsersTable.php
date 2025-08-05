<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Table;

class UsersTable
{
    protected static array $columns = [];

    public static function configure(Table $table): Table
    {
        return $table
            ->columns(static::getColumns())
            ->filters(config('filament-users.resource.table.filters')::make())
            ->recordActions(config('filament-users.resource.table.actions')::make())
            ->toolbarActions(config('filament-users.resource.table.bulkActions')::make());
    }

    public static function getDefaultColumns(): array
    {
        $columns = [
            Columns\ID::make(),
            Columns\Name::make(),
            Columns\Email::make(),
            Columns\Verified::make(),
            Columns\CreatedAt::make(),
            Columns\UpdatedAt::make(),
        ];

        if (filament('filament-user')::hasAvatar()) {
            $columns[] = Columns\Avatar::make();
        }

        return $columns;
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
