<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class ManageUserActions
{
    use Contracts\CanRegister;

    public function getDefaultActions(): array
    {
        return [
            Components\CreateAction::make(),
        ];
    }
}
