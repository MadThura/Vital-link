<?php

namespace Database\Seeders;

use App\Models\Blog;
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
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password',
            'role' => 'super_admin',
        ]);

        User::factory()->create([
            'name' => 'Dr Thet',
            'email' => 'bbank@gmail.com',
            'password' => 'password',
            'role' => 'blood_bank_admin',
        ]);

        User::factory()->create([
            'name' => 'Test Donor',
            'email' => 'donor@gmail.com',
            'password' => 'password',
            'role' => 'donor',
        ]);

        User::factory(10)->create();

        BloodBank::factory()->create([
            'user_id' => 2,
            'name' => 'National Blood Center',
            'phone' => '09250052532',
            'address' => 'No. 97, Corner of Bogyoke Aung San Road and Shwedagon Pagoda Road, Latha Township, Yangon 11131, Myanmar',
            'maxPersonsPerDay' => 20,
        ]);

        // BloodBank::factory()->create([
        //     'user_id' => 3,
        //     'name' => 'Yangon General Hospital Blood Bank',
        //     'address' => 'Inside Yangon General Hospital campus, Lanmadaw Township, Yangon 11131, Myanmar'
        // ]);

        // BloodBank::factory()->create([
        //     'user_id' => 4,
        //     'name' => 'North Okkalapa General Hospital Blood Bank',
        //     'address' => 'Maydarwi Street, Sa Lein Ward, North Okkalapa Township, Yangon 11031, Myanmar'
        // ]);

        Donor::factory(20)->create();

        Donor::factory()->create([
            'user_id' => 3,
            'blood_bank_id' => 1,
            'donor_code' => Donor::generateDonorCode(),
            'status' => 'approved',
            'profile_img' => 'donors/profiles/luffy.jpg',
            'address' => 'Foosha Village on Dawn Island',
            'blood_type' => 'B+',
            'gender' => 'Male',
            'health_certificate' => fake()->imageUrl(),
            'nrc' => '08/MaTaNa(N)494444',
            'nrc_back' => fake()->imageUrl(),
            'nrc_front' => fake()->imageUrl(),
            'phone' => '09250500009'
        ]);

        Blog::factory(12)->create();
    }
}
