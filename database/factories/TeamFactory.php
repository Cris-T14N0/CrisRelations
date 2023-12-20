<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //$roles = ['Ajudar','Criar','Produzir', 'Corrigir'];

        return [
            'name' => $this->faker->sentence,
            //'role' => $roles[fake()->numberBetween(0,3)],
        ];
        
    }
}
