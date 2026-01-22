<?php

declare(strict_types=1);

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
        $components = [];
        if (filament('filament-user')::hasAvatar()) {
            $components[] = Entries\Avatar::make();
        }

        $components[] = Entries\Name::make();
        $components[] = Entries\Email::make();
        $components[] = Entries\Verified::make();

        return $components;
    }

    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    public static function register(Entry | array $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if (! $item instanceof Entry) {
                    continue;
                }

                self::$schema[] = $item;
            }

            return;
        }

        self::$schema[] = $component;
    }
}
