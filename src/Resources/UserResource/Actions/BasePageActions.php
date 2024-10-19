<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

abstract class BasePageActions
{
    protected static array $actions = [];
    protected static ?Model $record = null;


    /**
     * @param Model|null $record
     * @return array
     */
    public static function make(?Model $record=null): array
    {
        static::$record = $record;
        return (new static())->getActions();
    }

    /**
     * @return array
     */
    public function getDefaultActions(): array
    {
        return [

        ];
    }

    /**
     * @return array
     */
    public function getActions(): array
    {
        return array_merge($this->getDefaultActions(), self::$actions);
    }

    /**
     * @param Action|array $component
     * @return void
     */
    public static function register(Action|array $component): void
    {
        if(is_array($component)) {
            foreach ($component as $item){
                if($item instanceof Action) {
                    self::$actions[] = $item;
                }
            }

        } else {
            self::$actions[] = $component;
        }
    }
}
