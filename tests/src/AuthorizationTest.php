<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Actions\Testing\TestAction;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Gate;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Pages;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;
use TomatoPHP\FilamentUsers\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Livewire\livewire;

beforeEach(function () {
    config()->set('filament-users.simple', false);

    actingAs(User::factory()->create());

    Filament::getCurrentOrDefaultPanel()->plugin(FilamentUsersPlugin::make());
});

it('hides the change password action when the policy denies updating the user', function () {
    Gate::policy(User::class, ProtectedUserPolicy::class);

    $protected = User::factory()->create(['email' => 'protected@example.com']);
    $regular = User::factory()->create();

    livewire(Pages\ListUsers::class)
        ->assertActionHidden(TestAction::make('changePassword')->table($protected))
        ->assertActionVisible(TestAction::make('changePassword')->table($regular));
});

it('keeps the change password action available when the app has no user policy', function () {
    $user = User::factory()->create();

    livewire(Pages\ListUsers::class)
        ->assertActionVisible(TestAction::make('changePassword')->table($user));
});

it('does not bulk delete users the policy protects', function () {
    Gate::policy(User::class, ProtectedUserPolicy::class);

    $protected = User::factory()->create(['email' => 'protected@example.com']);
    $regular = User::factory()->create();

    livewire(Pages\ListUsers::class)
        ->selectTableRecords([$protected->getKey(), $regular->getKey()])
        ->callAction(TestAction::make('delete')->table()->bulk());

    expect(User::query()->whereKey($protected->getKey())->exists())->toBeTrue()
        ->and(User::query()->whereKey($regular->getKey())->exists())->toBeFalse();
});
