<?php

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Facades\Filament;
use function Pest\Laravel\get;
use Illuminate\Config\Repository;
use Filament\Actions\DeleteAction;
use function Pest\Laravel\actingAs;

use function Pest\Livewire\livewire;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelMissing;
use TomatoPHP\FilamentUsers\Tests\Models\User;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\UserResource;

beforeEach(function () {
    $app = $this->app;

    tap($app['config'], function (Repository $config) {
        $config->set('filament-users.simple', true);
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

    livewire(Pages\ManageUsers::class)
        ->loadTable()
        ->assertCanSeeTableRecords($users)
        ->assertCountTableRecords(10);
});

it('can render user name/email column in table', function () {
    User::factory()->count(10)->create();

    livewire(Pages\ManageUsers::class)
        ->loadTable()
        ->assertCanRenderTableColumn('id')
        ->assertCanRenderTableColumn('name')
        ->assertCanRenderTableColumn('email');
});

it('can render user list page', function () {
    livewire(Pages\ManageUsers::class)->assertSuccessful();
});

it('can render view user action', function () {
    livewire(Pages\ManageUsers::class, [
        'record' => User::factory()->create(),
    ])
        ->mountAction('view')
        ->assertSuccessful();
});

it('can render user create action', function () {
    livewire(Pages\ManageUsers::class)
        ->mountAction('create')
        ->assertSuccessful();
});

it('can render user edit action', function () {
    livewire(Pages\ManageUsers::class, [
        'record' => User::factory()->create(),
    ])
        ->mountAction('edit')
        ->assertSuccessful();
});
