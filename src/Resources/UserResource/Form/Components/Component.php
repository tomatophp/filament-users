<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Form\Components;

use Filament\Forms\Components\Field;

abstract class Component
{
    /**
     * @return Field
     */
    public static abstract function make(): Field;
}
