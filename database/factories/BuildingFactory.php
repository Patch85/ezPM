<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $faker = $this->faker;
        $buildingNumber = $faker->unique()->buildingNumber();

        return [
            'building_number' => $buildingNumber,
            'description' => $faker->sentence(8, true), // description/name
            'address' => $faker->streetAddress(),
            'floors' => $faker->randomDigit(),
            'slug' => Str::slug($buildingNumber),
            'status' => $faker->randomElement([
                'To Do',
                'In Progress',
                'Complete',
            ]),
        ];
    }
}
