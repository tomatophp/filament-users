<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form;

use Filament\Forms\Components\Field;
use Filament\Forms\Form;

class UserForm
{
    protected static array $schema = [];

    public static function make(Form $form): Form
    {
        return $form->schema(self::getSchema())->columns(2);
    }

    public static function getDefaultComponents(): array
    {
        return [
            Components\Name::make(),
            Components\Email::make(),
            Components\Password::make(),
            Components\PasswordConfirmation::make(),
        ];
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Field | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Field) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
