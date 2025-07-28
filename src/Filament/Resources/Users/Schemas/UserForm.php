<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Field;
use Filament\Schemas\Schema;

class UserForm
{
    protected static array $schema = [];

    public static function configure(Schema $schema): Schema
    {
        return $schema->components(static::getSchema());
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
