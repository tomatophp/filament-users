<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables;

use Filament\Actions\BulkAction;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\BulkActions\DeleteAction;

class UserBulkActions
{
    /**
     * @var array
     */
    protected static $actions = [];

    public static function make(): array
    {
        return self::getActions();
    }

    private static function getDefaultActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    private static function getActions(): array
    {
        return array_merge(self::getDefaultActions(), self::$actions);
    }

    public static function register(BulkAction | array $action): void
    {
        if (is_array($action)) {
            foreach ($action as $item) {
                if (! $item instanceof BulkAction) {
                    continue;
                }

                self::$actions[] = $item;
            }

            return;
        }

        self::$actions[] = $action;
    }
}
