<?php

namespace Database\Seeders;

use App\Models\BloodBank;
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

        BloodBank::factory()->create([
            'user_id' => 2,
            'name' => 'National Blood Center',
            'address' => 'No. 97, Corner of Bogyoke Aung San Road and Shwedagon Pagoda Road, Latha Township, Yangon 11131, Myanmar'
        ]);

        BloodBank::factory()->create([
            'user_id' => 3,
            'name' => 'Yangon General Hospital Blood Bank',
            'address' => 'Inside Yangon General Hospital campus, Lanmadaw Township, Yangon 11131, Myanmar'
        ]);

        BloodBank::factory()->create([
            'user_id' => 4,
            'name' => 'North Okkalapa General Hospital Blood Bank',
            'address' => 'Maydarwi Street, Sa Lein Ward, North Okkalapa Township, Yangon 11031, Myanmar'
        ]);

        Donor::factory(20)->create();
    }
}
