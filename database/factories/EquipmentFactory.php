<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = $this->faker;

        $words = $faker->words(3, true);

        $type = $faker->randomElement([
            'Air Handler Unit',
            'Fan Coil Unit',
            'VAV',
        ]);

        $name = "$type $words";

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'type' => $type,
            'floor' => $faker->randomDigit(),
            'room_number' => $faker->biasedNumberBetween(1, 50),
            'description' => $faker->sentences(8, true),
            'functional_status' => $faker->randomElement([
                'Functional',
                'Functional - Requires Maintenance',
                'Semi-Functional',
                'Not Functional',
            ]),
            'pm_status' => $faker->randomElement([
                'To Do',
                'In Progress',
                'Complete',
            ]),
        ];
    }
}
