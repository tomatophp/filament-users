<?php

namespace TomatoPHP\FilamentUsers\Tests\Database\Seeders;

use TomatoPHP\FilamentUsers\Tests\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Fady Mondy',
            'email' => 'info@3x1.io',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);
    }
}
