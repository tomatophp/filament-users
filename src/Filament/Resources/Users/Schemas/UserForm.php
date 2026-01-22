<?php

declare(strict_types=1);

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
        $components = [];
        if (filament('filament-user')::hasAvatar()) {
            $components[] = Components\Avatar::make();
        }

        $components[] = Components\Name::make();
        $components[] = Components\Email::make();
        $components[] = Components\Password::make();
        $components[] = Components\PasswordConfirmation::make();

        return $components;
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Field | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if (! $item instanceof Field) {
                    continue;
                }

                self::$schema[] = $item;
            }

            return;
        }

        self::$schema[] = $component;
    }
}
