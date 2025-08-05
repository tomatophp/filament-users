<?php

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Facades\Filament;
use Illuminate\Config\Repository;
use Lab404\Impersonate\Services\ImpersonateManager;
use TomatoPHP\FilamentUsers\Filament\Resources\Users\Tables\Actions\ImpersonateAction;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;
use TomatoPHP\FilamentUsers\Tests\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $app = $this->app;

    tap($app['config'], function (Repository $config) {
        $config->set('filament-users.impersonate.enabled', true);
        $config->set('filament-users.impersonate.redirect_to', '/admin');
        $config->set('filament-users.impersonate.back_to', '/admin');
        $config->set('filament-users.impersonate.auth_guard', 'web');
        $config->set('filament-users.impersonate.leave_middleware', 'web');
        $config->set('filament-users.simple', false);
    });

    actingAs(User::factory()->create());

    $this->panel = Filament::getCurrentOrDefaultPanel();
    $this->panel->plugin(
        FilamentUsersPlugin::make()
    );
});

it('can test impersonate action within Filament panel', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $targetUser = User::factory()->create(['email' => 'user@example.com']);

    actingAs($admin);

    // Test that the action can be created and configured within the panel
    $action = ImpersonateAction::make();

    expect($action)->toBeInstanceOf(\Filament\Actions\Action::class);

    // Test the action within the panel context
    $impersonateAction = new ImpersonateAction();
    $impersonateAction->guard($this->panel->getAuthGuard());
    $impersonateAction->redirectTo($this->panel->getUrl());
    $impersonateAction->backTo($this->panel->getUrl());

    $result = $impersonateAction->impersonate($targetUser);

    expect($result)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);
    expect($result->getTargetUrl())->toBe($this->panel->getUrl());

    $impersonateManager = app(ImpersonateManager::class);
    expect($impersonateManager->isImpersonating())->toBeTrue();
});

it('can test impersonate action in Filament resource context', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $targetUser = User::factory()->create(['email' => 'user@example.com']);

    actingAs($admin);

    // Test the action within the Filament resource context
    $impersonateAction = new ImpersonateAction();

    // Configure with panel-specific settings
    $impersonateAction->guard($this->panel->getAuthGuard());
    $impersonateAction->redirectTo($this->panel->getUrl());
    $impersonateAction->backTo($this->panel->getUrl());

    // Test that the action works within the panel context
    $result = $impersonateAction->impersonate($targetUser);

    expect($result)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);
    expect($result->getTargetUrl())->toBe($this->panel->getUrl());

    // Verify impersonation state
    $impersonateManager = app(ImpersonateManager::class);
    expect($impersonateManager->isImpersonating())->toBeTrue();

    // Test leaving impersonation within panel context
    $response = get('/filament-impersonate/leave');
    expect($response->getStatusCode())->toBe(302);
    expect($impersonateManager->isImpersonating())->toBeFalse();
});

it('uses custom guard for impersonation', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $targetUser = User::factory()->create(['email' => 'user@example.com']);

    actingAs($admin);

    $impersonateAction = new ImpersonateAction();
    $impersonateAction->guard('testing');
    $impersonateAction->impersonate($targetUser);

    expect(session('impersonate.guard'))->toBe('testing');
});

it('can create impersonate action', function () {
    $action = ImpersonateAction::make();

    expect($action)->toBeInstanceOf(\Filament\Actions\Action::class);
});

it('tests impersonation with reflection for protected methods', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $targetUser = User::factory()->create(['email' => 'user@example.com']);

    actingAs($admin);

    $impersonateAction = new ImpersonateAction();

    // Use reflection to test protected method
    $reflection = new \ReflectionClass($impersonateAction);
    $canBeImpersonatedMethod = $reflection->getMethod('canBeImpersonated');
    $canBeImpersonatedMethod->setAccessible(true);

    expect($canBeImpersonatedMethod->invoke($impersonateAction, $targetUser))->toBeTrue();
    expect($canBeImpersonatedMethod->invoke($impersonateAction, $admin))->toBeFalse();
});

it('can test impersonate action in Filament table context', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $targetUser = User::factory()->create(['email' => 'user@example.com']);

    actingAs($admin);

    // Test the action within the Filament table context
    $impersonateAction = new ImpersonateAction();

    // Configure with panel-specific settings
    $impersonateAction->guard($this->panel->getAuthGuard());
    $impersonateAction->redirectTo($this->panel->getUrl());
    $impersonateAction->backTo($this->panel->getUrl());

    // Test that the action works within the table context
    $result = $impersonateAction->impersonate($targetUser);

    expect($result)->toBeInstanceOf(\Illuminate\Http\RedirectResponse::class);
    expect($result->getTargetUrl())->toBe($this->panel->getUrl());

    // Verify impersonation state
    $impersonateManager = app(ImpersonateManager::class);
    expect($impersonateManager->isImpersonating())->toBeTrue();

    // Test session data within panel context
    expect(session('impersonate.guard'))->toBe($this->panel->getAuthGuard());
    expect(session('impersonate.back_to'))->toBe($this->panel->getUrl());

    // Test leaving impersonation
    $response = get('/filament-impersonate/leave');
    expect($response->getStatusCode())->toBe(302);
    expect($impersonateManager->isImpersonating())->toBeFalse();
});
