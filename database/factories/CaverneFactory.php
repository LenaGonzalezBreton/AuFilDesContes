<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Caverne>
 */
class CaverneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre_caverne' => fake()->jobTitle(),
            'intro_caverne' => fake()->date(),
            'image_caverne' => fake()->time('H:i:s'),
        ];
    }
}
