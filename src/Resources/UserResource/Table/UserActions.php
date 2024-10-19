<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use Filament\Tables\Actions\Action;

class UserActions
{
    /**
     * @var array
     */
    protected static $actions = [];

    /**
     * @return array
     */
    public static function make(): array
    {
        return self::getActions();
    }

    /**
     * @return array
     */
    private static function getDefaultActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * @return array
     */
    private static function getActions(): array
    {
        return array_merge(self::getDefaultActions(), self::$actions);
    }

    /**
     * @param Action|array $action
     * @return void
     */
    public static function register(\Filament\Tables\Actions\Action|array $action): void
    {
        if(is_array($action)) {
            foreach ($action as $item){
                if($item instanceof \Filament\Tables\Actions\Action) {
                    self::$actions[] = $item;
                }
            }
        } else {
            self::$actions[] = $action;
        }
    }
}
