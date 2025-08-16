<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $shuffledImages = null;

        // Initialize the shuffled images array once
        if ($shuffledImages === null) {
            $imageDirectory = storage_path('app/public/blog_seed_images');
            $allImages = glob($imageDirectory . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);

            // Shuffle the images for randomness
            shuffle($allImages);

            $shuffledImages = $allImages;
        }

        // Get the next image from the shuffled list
        $randomImage = null;
        if (!empty($shuffledImages)) {
            $randomImage = basename(array_shift($shuffledImages)); // remove from array
        }

        return [
            'user_id' => 1,
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(),
            'image' => $randomImage ? 'blog_seed_images/' . $randomImage : null,
        ];
    }
}
