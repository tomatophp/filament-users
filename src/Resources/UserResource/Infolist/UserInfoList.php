<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Infolist;

use Filament\Infolists\Components\Entry;
use Filament\Infolists\Infolist;

class UserInfoList
{
    protected static array $schema = [];

    /**
     * @param Infolist $infolist
     * @return Infolist
     */
    public static function make(Infolist $infolist): Infolist
    {
        return $infolist->schema(self::getSchema());
    }

    /**
     * @return array
     */
    public static function getDefaultComponents(): array
    {
        return [
            Entries\Name::make(),
            Entries\Email::make(),
            Entries\Verified::make(),
        ];
    }

    /**
     * @return array
     */
    private static function getSchema(): array
    {
        return array_merge(self::getDefaultComponents(), self::$schema);
    }

    /**
     * @param Entry|array $component
     * @return void
     */
    public static function register(Entry|array $component): void
    {
        if(is_array($component)) {
            foreach ($component as $item){
                if($item instanceof Entry) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
