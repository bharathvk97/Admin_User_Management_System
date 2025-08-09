<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Status;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@techieeshub.com',
            'phone' => '1234567890',
            'password' => bcrypt('Admin123'),
            'type' => 'admin',
            'status'   => Status::ACTIVE,
        ]);
    }
}
