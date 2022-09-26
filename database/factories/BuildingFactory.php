<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'building_number' => $this->faker->unique()->buildingNumber(),
            'description' => $this->faker->sentence(8, true), // description/name
            'address' => $this->faker->streetAddress(),
            'floors' => $this->faker->randomDigit(),
            'slug' => $this->faker->slug(),
            'status' => $this->faker->randomElement([
                'To Do',
                'In Progress',
                'Complete',
            ]),
        ];
    }
}
