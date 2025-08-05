<?php

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Testing\TestAction;
use Filament\Facades\Filament;
use Illuminate\Config\Repository;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;
use TomatoPHP\FilamentUsers\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use function Pest\Livewire\livewire;

beforeEach(function () {
    $app = $this->app;

    tap($app['config'], function (Repository $config) {
        $config->set('filament-users.simple', false);
    });

    actingAs(User::factory()->create());

    $this->panel = Filament::getCurrentOrDefaultPanel();
    $this->panel->plugin(
        FilamentUsersPlugin::make()
    );
});

it('can bulk delete users', function () {
    $users = User::factory()->count(5)->create();

    livewire(Pages\ListUsers::class)
        ->assertCanSeeTableRecords($users)
        ->selectTableRecords($users)
        ->callAction(TestAction::make(DeleteBulkAction::class)->table()->bulk())
        ->assertNotified()
        ->assertCanNotSeeTableRecords($users);

    $users->each(fn (User $user) => assertModelMissing($user));
});

it('can delete user', function () {
    $user = User::factory()->create();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])->callAction(DeleteAction::class)
        ->assertNotified()
        ->assertRedirect();

    assertModelMissing($user);
});

it('can not delete user if it is current user', function () {
    $user = auth()->user();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])->callAction(DeleteAction::class);

    assertDatabaseHas(User::class, [
        'name' => $user->name,
        'email' => $user->email,
    ]);
});

it('can not delete user if it is the last user', function () {
    User::query()->delete();
    $user = User::factory()->create();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])->callAction(DeleteAction::class);

    assertDatabaseHas(User::class, [
        'name' => $user->name,
        'email' => $user->email,
    ]);
});
