<?php

namespace TomatoPHP\FilamentUsers\Tests;

use Filament\Panel;
use Filament\FilamentServiceProvider;
use Livewire\LivewireServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\Attributes\WithEnv;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\Schemas\SchemasServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use TomatoPHP\FilamentUsers\Tests\Models\User;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Filament\Infolists\InfolistsServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Lab404\Impersonate\ImpersonateServiceProvider;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use TomatoPHP\FilamentUsers\FilamentUsersServiceProvider;
use TomatoPHP\FilamentUsers\Tests\Database\Seeders\UserSeed;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;

#[WithEnv('DB_CONNECTION', 'testing')]
abstract class TestCase extends BaseTestCase
{
    use LazilyRefreshDatabase;
    use WithWorkbench;

    public ?Panel $panel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([
            UserSeed::class,
        ]);
    }

    protected function getPackageProviders($app): array
    {
        $providers = [
            ImpersonateServiceProvider::class,
            ActionsServiceProvider::class,
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            SchemasServiceProvider::class,
            InfolistsServiceProvider::class,
            LivewireServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            FilamentUsersServiceProvider::class,
            AdminPanelProvider::class,
        ];

        sort($providers);

        return $providers;
    }

    protected function defineEnvironment($app)
    {

        tap($app['config'], function (Repository $config) {
            $config->set('filament-users.model', User::class);
            $config->set('filament-users.simple', false);
            $config->set('database.default', 'testing');
            $config->set('database.connections.testing', [
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ]);

            $config->set('auth.guards.testing.driver', 'session');
            $config->set('auth.guards.testing.provider', 'testing');
            $config->set('auth.providers.testing.driver', 'eloquent');
            $config->set('auth.providers.testing.model', User::class);

            $config->set('view.paths', [
                ...$config->get('view.paths'),
                __DIR__ . '/../resources/views',
            ]);
        });
    }
}
