<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form;

use Filament\Forms\Components\Field;
use Filament\Forms\Form;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components\Component;

class UserForm
{
    protected static array $schema = [];

    /**
     * @param Form $form
     * @return Form
     */
    public static function make(Form $form): Form
    {
        return $form->schema(self::getSchema());
    }

    /**
     * @return array
     */
    public static function getDefaultComponents(): array
    {
        return [
            Components\Name::make(),
            Components\Email::make(),
            Components\Password::make(),
            Components\PasswordConfirmation::make(),
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
     * @param Field|array $component
     * @return void
     */
    public static function register(Field|array $component): void
    {
        if(is_array($component)) {
            foreach ($component as $item){
                if($item instanceof Field) {
                    self::$schema[] = $item;
                }
            }

        } else {
            self::$schema[] = $component;
        }
    }
}
