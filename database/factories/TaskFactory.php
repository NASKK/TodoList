<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Finir dashboard', 'Faire un test', 'Finir css', 'Finir produits','Verification clean code']),
            'description' => fake()->randomElement(['description1', 'description2', 'description3', 'description4', 'description5', ]),

            //
        ];
    }
}
