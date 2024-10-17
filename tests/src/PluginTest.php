<?php

use Filament\Facades\Filament;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;

it('registers plugin', function () {
    $panel = Filament::getCurrentPanel();

    $panel->plugins([
        FilamentUsersPlugin::make(),
    ]);

    expect($panel->getPlugin('filament-user'))
        ->not()
        ->toThrow(Exception::class);
});

it('can modify avatar', function ($condition) {
    $plugin = FilamentUsersPlugin::make()
        ->useAvatar($condition);

    expect($plugin::hasAvatar())->toBe($condition);
})->with([
    false,
    fn () => true,
]);
