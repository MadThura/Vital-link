<?php

namespace Database\Factories;

use App\Models\BloodBank;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donor>
 */
class DonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            // 'blood_bank_id' => random_int(1, 3),

            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'DOB' => $this->faker->date('Y-m-d', '2005-01-01'),

            'nrc' => $this->faker->randomElement(['12/YGN(N)123456', '5/MYA(T)654321']),

            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,

            'blood_type' => $this->faker->randomElement(['A-', 'B-', 'O-', 'AB-', 'A+', 'B+', 'O+', 'AB+']),
        ];
    }
}
