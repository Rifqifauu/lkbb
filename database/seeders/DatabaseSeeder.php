<?php

namespace Database\Seeders;

use App\Filament\Resources\AspekPBBResource\Widgets\AspekPBB;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(AspekPBBSeeder::class);

        User::factory()->create(
            [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]
    );
    }
}
