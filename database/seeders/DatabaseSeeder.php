<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BloodBank;
use App\Models\Donor;
use App\Models\User;
use App\Notifications\NewBlogUploaded;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Notification;

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
            'maxPersonsPerDay' => 1,
        ]);

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

        $blogs = [
            [
                'title' => 'Lifeline Blood Drive at Yangon General Hospital',
                'body' => "Yangon General Hospital invites the public to participate in our upcoming blood drive this Saturday. The event will run from 9:00 AM to 4:00 PM, with trained medical staff ensuring safe and comfortable donations.\n\nBlood collected will support patients undergoing surgeries, accident victims, and people with chronic conditions. Every donor will receive a free health check-up, refreshments, and a certificate of appreciation. One donation has the power to save up to three lives—join us in making an impact today.",
            ],
            [
                'title' => 'RedLink Community Donation Festival',
                'body' => "RedLink is hosting a large-scale community donation event in partnership with the National Blood Center. The festival will take place at Maha Bandula Park and feature awareness sessions, family activities, and health booths alongside blood donations.\n\nAll donors will be recognized with a certificate and given priority assistance in future emergencies. This event is not only about donating blood but also about creating a culture of compassion and unity across our community.",
            ],
            [
                'title' => 'University Students’ Union Blood Drive',
                'body' => "The University Students’ Union is organizing a blood donation drive to engage students, lecturers, and staff in saving lives. A mobile blood collection unit will be available throughout the day, making it easy for participants to contribute.\n\nThis initiative highlights the role of young people in community service. Every donation supports patients battling leukemia, those in emergency care, and children requiring regular transfusions. Together, we can prove that youth can lead by example.",
            ],
            [
                'title' => 'Blood for Hope – Thalassemia Awareness and Donation Day',
                'body' => "Children suffering from thalassemia need frequent transfusions to survive. To support them, the National Pediatric Hospital is hosting a blood donation event with the theme “Blood for Hope.”\n\nThe event includes educational talks by specialists and personal stories from families of thalassemia patients. By donating, you provide hope and relief for children who depend on a constant supply of safe blood.",
            ],
            [
                'title' => 'Corporate Heroes in Red Campaign',
                'body' => "As part of our corporate social responsibility program, our company is partnering with the Blood Center to launch “Heroes in Red.” Employees and their families are invited to join this blood donation campaign at the company headquarters.\n\nThis campaign not only helps hospitals but also encourages a sense of unity among employees. All donors will be added to the national registry as regular contributors. Workplaces can be hubs of kindness—become a hero today.",
            ],
            [
                'title' => 'World Blood Donor Day Celebration 2025',
                'body' => "On June 14th, we join the world in honoring voluntary blood donors. This year’s celebration at City Hall will feature awareness seminars, recognition awards, and a day-long donation drive.\n\nThe theme is “Safe Blood for All”, stressing the need for regular, unpaid donations. Donors and their families are encouraged to share stories that inspire others to contribute to this lifesaving mission.",
            ],
            [
                'title' => 'Emergency Relief Drive for Road Accident Victims',
                'body' => "Recent traffic accidents have created an urgent need for blood at local hospitals. The Township Blood Bank is calling for immediate donations, especially from O-negative and A-positive donors.\n\nEvery unit donated during this emergency will be directed straight to hospital emergency wards. Donors will also be given priority support if they or their families face urgent medical needs in the future.",
            ],
            [
                'title' => 'Give Blood, Give Life – Township Health Fair',
                'body' => "The Township Health Department invites families to a health fair that combines education, screenings, and a large donation program. The event will include nutrition counseling, child health booths, and fun family activities.\n\nBlood donors will receive free medical consultations and gain insights into how their donation saves lives daily. This fair is a celebration of health, kindness, and shared responsibility.",
            ],
            [
                'title' => 'School Alumni Association Blood Donation Day',
                'body' => "The 1999 Alumni Association is organizing its annual blood drive at the school grounds. All alumni, teachers, students, and parents are encouraged to participate.\n\nWhat began as a tribute to a beloved teacher in need of transfusions has now become a yearly tradition that saves lives. This gathering is proof that bonds of friendship can grow into acts of humanity.",
            ],
            [
                'title' => 'Youth Volunteers – Blood Connect Campaign',
                'body' => "The Youth Volunteer Network has launched the “Blood Connect” campaign to encourage long-term donor commitments. The first event will be held in Mandalay at the Central Blood Bank.\n\nDonors will be registered as ongoing contributors and reminded every six months to give again. Volunteers will also share stories of how blood donations saved lives, inspiring a new generation of regular donors.",
            ],
            [
                'title' => 'Seasonal Blood Donation – Monsoon Care Initiative',
                'body' => "During the monsoon season, hospitals often face shortages due to an increase in accidents and waterborne diseases. The Monsoon Care Initiative is set up to fill this gap with a dedicated blood donation drive.\n\nWe encourage all healthy individuals to step forward during this critical time. Free health tips, immune-boosting supplements, and doctor consultations will be available for all participants.",
            ],
            [
                'title' => 'Community Churches Joint Blood Drive',
                'body' => "Local churches have united to host a joint blood drive at the Township Hall. This faith-based initiative aims to encourage compassion and service beyond religious boundaries.\n\nThe program will include prayer sessions, motivational talks, and donor registration for future drives. By donating, participants show that kindness and humanity are universal values that save lives.",
            ],
        ];

        $usersToNotify = User::whereIn('role', ['donor', 'blood_bank_admin'])->get();

        foreach ($blogs as $index => $blogData) {
            $blog = Blog::factory()->create([
                'user_id' => 1,
                'title' => $blogData['title'],
                'body' => $blogData['body'],
                'image' => 'blog_seed_images/poster-' . ($index + 1) . '.jpeg',
            ]);
            app()['url']->forceRootUrl('http://localhost:8000');
            Notification::send($usersToNotify, new NewBlogUploaded($blog));
        }
    }
}
