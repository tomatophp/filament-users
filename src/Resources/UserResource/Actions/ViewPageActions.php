<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions;

class ViewPageActions extends BasePageActions
{
    public function getDefaultActions(): array
    {
        return [
            Components\EditAction::make(self::$record),
            Components\DeleteAction::make(),
        ];
    }
}
