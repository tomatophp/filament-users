<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class BasePageActions
{
    protected static array $actions = [];

    protected static ?Model $record = null;

    public static function make(?Model $record = null): array
    {
        self::$record = $record;

        return (new self)->getActions();
    }

    public function getDefaultActions(): array
    {
        return [

        ];
    }

    public function getActions(): array
    {
        return array_merge($this->getDefaultActions(), self::$actions);
    }

    public static function register(Action | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Action) {
                    self::$actions[] = $item;
                }
            }

        } else {
            self::$actions[] = $component;
        }
    }
}
