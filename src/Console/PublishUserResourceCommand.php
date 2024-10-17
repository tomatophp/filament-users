<?php

namespace TomatoPHP\FilamentUsers\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;

class PublishUserResourceCommand extends Command
{
    use HandleStub;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'filament-users:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish filament user resource to the main app';

    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->generateStubs(
            __DIR__ . '/../../stubs/UserResource.stub',
            app_path('Filament/Resources') . '/UserResource.php',
            [],
            [
                app_path('Filament'),
                app_path('Filament/Resources'),
                app_path('Filament/Resources/UserResource'),
            ]
        );
        $this->generateStubs(
            __DIR__ . '/../../stubs/ListUsers.stub',
            app_path('Filament/Resources/UserResource/Pages') . '/ListUsers.php',
            [],
            [
                app_path('Filament'),
                app_path('Filament/Resources'),
                app_path('Filament/Resources/UserResource'),
                app_path('Filament/Resources/UserResource/Pages'),
            ]
        );
        $this->generateStubs(
            __DIR__ . '/../../stubs/EditUser.stub',
            app_path('Filament/Resources/UserResource/Pages') . '/EditUser.php',
            [],
            [
                app_path('Filament'),
                app_path('Filament/Resources'),
                app_path('Filament/Resources/UserResource'),
                app_path('Filament/Resources/UserResource/Pages'),
            ]
        );
        $this->generateStubs(
            __DIR__ . '/../../stubs/CreateUser.stub',
            app_path('Filament/Resources/UserResource/Pages') . '/CreateUser.php',
            [],
            [
                app_path('Filament'),
                app_path('Filament/Resources'),
                app_path('Filament/Resources/UserResource'),
                app_path('Filament/Resources/UserResource/Pages'),
            ]
        );

        $this->info('Filament User Resource published successfully.');
    }
}
