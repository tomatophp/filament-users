<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Table;

class UserFilters
{
    /**
     * @var array
     */
    protected static $filters = [];

    /**
     * @return array
     */
    public static function make(): array
    {
        return self::getFilters();
    }

    /**
     * @return array
     */
    private static function getDefaultFilters(): array
    {
        return [
            Filters\Verified::make()
        ];
    }

    /**
     * @return array
     */
    private static function getFilters(): array
    {
        return array_merge(self::getDefaultFilters(), self::$filters);
    }

    /**
     * @param \Filament\Tables\Filters\BaseFilter|array $action
     * @return void
     */
    public static function register(\Filament\Tables\Filters\BaseFilter|array $action): void
    {
        if(is_array($action)) {
            foreach ($action as $item){
                if($item instanceof \Filament\Tables\Filters\BaseFilter) {
                    self::$filters[] = $item;
                }
            }
        } else {
            self::$filters[] = $action;
        }
    }
}
