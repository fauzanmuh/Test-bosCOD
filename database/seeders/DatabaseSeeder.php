<?php

namespace Database\Seeders;

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

        User::factory()->create([
            'name' => 'Fauzan',
            'email' => 'fauzan@gmail.com',
            'password' => bcrypt(value: 'password'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@boscod.com',
            'password' => bcrypt(value: 'rahasia'),
        ]);
    }
}
