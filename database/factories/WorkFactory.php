<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle,
            'description' =>fake()->paragraphs(3, true),
            'salary' =>fake()->numberBetween(3_000 , 10_000),
            'location' => fake()->city,
            'category' => fake()->randomElement(Work::$category),
            'experience' => fake()->randomElement(Work::$experience)
        ];
    }
}
