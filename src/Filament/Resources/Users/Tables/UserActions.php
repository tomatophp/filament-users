<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables;

class UserActions
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
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
            Actions\ChangePassword::make(),
            Actions\DeleteAction::make(),
        ];
    }

    private static function getActions(): array
    {
        return array_merge(self::getDefaultActions(), self::$actions);
    }

    public static function register(\Filament\Actions\Action | array $action): void
    {
        if (is_array($action)) {
            foreach ($action as $item) {
                if (! $item instanceof \Filament\Actions\Action) {
                    continue;
                }

                self::$actions[] = $item;
            }

            return;
        }

        self::$actions[] = $action;
    }
}
