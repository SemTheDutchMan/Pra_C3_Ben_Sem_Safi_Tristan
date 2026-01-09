<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\DemoDataSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin123',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'isAdmin' => true,
        ]);

        $this->call(DemoDataSeeder::class);
    }
}
