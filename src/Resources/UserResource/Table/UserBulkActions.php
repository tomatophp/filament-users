<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

use Filament\Tables\Actions\BulkAction;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\BulkActions\DeleteAction;

class UserBulkActions
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
            DeleteAction::make()
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
     * @param BulkAction|array $action
     * @return void
     */
    public static function register(BulkAction|array $action): void
    {
        if(is_array($action)) {
            foreach ($action as $item){
                if($item instanceof BulkAction) {
                    self::$actions[] = $item;
                }
            }
        } else {
            self::$actions[] = $action;
        }
    }
}
