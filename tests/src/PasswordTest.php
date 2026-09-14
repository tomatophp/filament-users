<?php

declare(strict_types=1);

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Actions\Testing\TestAction;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
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

it('hashes the password when creating a user', function () {
    livewire(Pages\CreateUser::class)
        ->fillForm([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'Secret-Pass-123',
            'passwordConfirmation' => 'Secret-Pass-123',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $password = User::query()->where('email', 'jane@example.com')->value('password');

    expect($password)->not->toBe('Secret-Pass-123')
        ->and(Hash::check('Secret-Pass-123', $password))->toBeTrue();
});

it('sets the given password from the change password action', function () {
    $user = User::factory()->create();

    livewire(Pages\ListUsers::class)
        ->callAction(TestAction::make('changePassword')->table($user), data: [
            'password' => 'Brand-New-Pass-456',
            'passwordConfirmation' => 'Brand-New-Pass-456',
        ])
        ->assertHasNoErrors();

    expect(Hash::check('Brand-New-Pass-456', $user->refresh()->password))->toBeTrue();
});

it('generates a new password when the change password action is left blank', function () {
    $user = User::factory()->create();
    $original = $user->password;

    livewire(Pages\ListUsers::class)
        ->callAction(TestAction::make('changePassword')->table($user))
        ->assertHasNoErrors()
        ->assertNotified();

    $user->refresh();

    expect($user->password)->not->toBe($original)
        ->and(Hash::isHashed($user->password))->toBeTrue();
});
