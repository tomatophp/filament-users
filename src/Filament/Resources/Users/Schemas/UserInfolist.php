<?php

namespace TomatoPHP\FilamentUsers\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\Entry;
use Filament\Schemas\Schema;

class UserInfolist
{
    protected static array $schema = [];

    public static function configure(Schema $schema): Schema
    {
        return $schema->components(static::getSchema());
    }

    public static function getDefaultComponents(): array
    {
        return [
            Entries\Name::make(),
            Entries\Email::make(),
            Entries\Verified::make(),
        ];
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Entry | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof Entry) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
