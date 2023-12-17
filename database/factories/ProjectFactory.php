<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $estados = ['Feito','Em curso','Em projeto'];

        return [

            'name' => fake()->sentence(6),
            'state' => $estados[fake()->numberBetween(0,2)],
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
