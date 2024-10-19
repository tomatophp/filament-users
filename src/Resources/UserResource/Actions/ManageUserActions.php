<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class ManageUserActions extends BasePageActions
{
    public function getDefaultActions(): array
    {
        return [
            Components\CreateAction::make(),
        ];
    }
}
