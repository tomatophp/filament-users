<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class EditPageActions
{
    use Contracts\CanRegister;

    public function getDefaultActions(): array
    {
        return [
            Components\ViewAction::make(),
            Components\DeleteAction::make(),
        ];
    }
}
