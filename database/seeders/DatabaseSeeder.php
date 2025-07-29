<?php

namespace Database\Seeders;

use App\Models\Donor;
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
        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role' => 'super_admin',
        ]);

        User::factory()->create([
            'email' => 'bbank@gmail.com',
            'password' => 'password',
            'role' => 'blood_bank_admin',
        ]);

        User::factory(10)->create();

        Donor::factory(20)->create();
    }
}
