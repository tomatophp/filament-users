<?php

namespace TomatoPHP\FilamentUsers\Console;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\HandleFiles;
use TomatoPHP\ConsoleHelpers\Traits\HandleStub;

class FilamentUserTeamsCommand extends Command
{
    use HandleFiles;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'filament-users:teams';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'publish filament user teams resource to the main app';

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
        // Copy Migrations
        $this->copyFile(
            __DIR__ . '/../../stubs/database/migrations/create_team_invitations_table.php',
            database_path('migrations/' . date('Y_m_d_His') . '_create_team_invitations_table.php')
        );

        $this->copyFile(
            __DIR__ . '/../../stubs/database/migrations/create_teams_table.php',
            database_path('migrations/' . date('Y_m_d_His') . '_create_teams_table.php')
        );

        $this->copyFile(
            __DIR__ . '/../../stubs/database/migrations/create_team_user_table.php',
            database_path('migrations/' . date('Y_m_d_His') . '_create_team_user_table.php')
        );

        $this->copyFile(
            __DIR__ . '/../../stubs/database/migrations/update_users_table.php',
            database_path('migrations/' . date('Y_m_d_His') . '_update_users_table.php')
        );

        //Copy Models
        $this->copyFile(
            __DIR__ . '/../../stubs/app/Models/Team.php',
            app_path('Models/Team.php')
        );

        $this->copyFile(
            __DIR__ . '/../../stubs/app/Models/TeamInvitation.php',
            app_path('Models/TeamInvitation.php')
        );

        $this->copyFile(
            __DIR__ . '/../../stubs/app/Models/Membership.php',
            app_path('Models/Membership.php')
        );


        $this->info('Filament User Teams Resource published successfully.');
    }
}
