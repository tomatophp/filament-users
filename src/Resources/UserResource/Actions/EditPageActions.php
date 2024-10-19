<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class EditPageActions extends BasePageActions
{
    /**
     * @return array
     */
    public function getDefaultActions(): array
    {
        return [
            Components\ViewAction::make(),
            Components\DeleteAction::make(),
        ];
    }
}
