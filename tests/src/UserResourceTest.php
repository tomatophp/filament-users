<?php

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Facades\Filament;
use function Pest\Laravel\get;
use Illuminate\Config\Repository;
use Filament\Actions\DeleteAction;
use function Pest\Laravel\actingAs;

use function Pest\Livewire\livewire;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use TomatoPHP\FilamentUsers\Tests\Models\User;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\UserResource;

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

it('can render user resource', function () {
    $this->get(UserResource::getUrl('index'))->assertSuccessful();
});

it('can list posts', function () {
    User::query()->delete();
    $users = User::factory()->count(10)->create();

    livewire(Pages\ListUsers::class)
        ->loadTable()
        ->assertCanSeeTableRecords($users)
        ->assertCountTableRecords(10);
});

it('can render user name/email column in table', function () {
    User::factory()->count(10)->create();

    livewire(Pages\ListUsers::class)
        ->loadTable()
        ->assertCanRenderTableColumn('id')
        ->assertCanRenderTableColumn('name')
        ->assertCanRenderTableColumn('email');
});

it('can render user list page', function () {
    livewire(Pages\ListUsers::class)->assertSuccessful();
});


it('can render view user page', function () {
    get(UserResource::getUrl('view', [
        'record' => User::factory()->create(),
    ]))->assertSuccessful();
});


it('can render user create page', function () {
    get(UserResource::getUrl('create'))->assertSuccessful();
});

it('can create new user', function () {
    $newData = User::factory()->make();

    $password = str()->random(10);

    livewire(Pages\CreateUser::class)
        ->fillForm([
            'name' => $newData->name,
            'email' => $newData->email,
            'password' => $password,
            'passwordConfirmation' => $password,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    assertDatabaseHas(User::class, [
        'name' => $newData->name,
        'email' => $newData->email,
    ]);
});

it('can validate user input', function () {
    livewire(Pages\CreateUser::class)
        ->fillForm([
            'name' => null,
            'email' => null,
            'password' => null,
            'passwordConfirmation' => null,
        ])
        ->call('create')
        ->assertHasFormErrors([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required',
        ]);
});


it('can render user edit page', function () {
    get(UserResource::getUrl('edit', [
        'record' => User::factory()->create(),
    ]))->assertSuccessful();
});

it('can retrieve user data', function () {
    $user = User::factory()->create();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->assertFormSet([
            'name' => $user->name,
            'email' => $user->email,
        ]);
});

it('can validate edit user input', function () {
    $user = User::factory()->create();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->fillForm([
            'name' => null,
            'email' => null,
        ])
        ->call('save')
        ->assertHasFormErrors([
            'name' => 'required',
            'email' => 'required',
        ]);
});

it('can save user data', function () {
    $user = User::factory()->create();
    $newData = User::factory()->make();

    livewire(Pages\EditUser::class, [
        'record' => $user->getRouteKey(),
    ])
        ->fillForm([
            'name' => $newData->name,
            'email' => $newData->email,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($user->refresh())
        ->name->toBe($newData->name)
        ->email->toBe($newData->email);
});
