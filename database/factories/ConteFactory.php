<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conte>
 */
class ConteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre_conte' => fake()->word(),
            'intro_conte' => fake()->sentence(5),
            'image_conte' => fake()->image(null, 640, 480),
            'histoire_conte' => fake()->mimeType(),
            'nombre_lecture_conte' => fake()->numberBetween(1, 20),
            'note_conte' => fake()->numberBetween(1, 20),
            'nombre_note_conte' => fake()->numberBetween(1, 20),
            'caverne_id' => \App\Models\Caverne::inRandomOrder()->first()->id,




        ];
    }
}
