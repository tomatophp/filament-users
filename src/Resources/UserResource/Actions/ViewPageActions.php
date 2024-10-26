<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class ViewPageActions
{
    use Contracts\CanRegister;

    public function getDefaultActions(): array
    {
        return [
            Components\EditAction::make(),
            Components\DeleteAction::make(),
        ];
    }
}
