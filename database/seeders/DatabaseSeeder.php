<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Caverne;
use App\Models\Conte;
use App\Models\LivreOr;
use App\Models\MotCle;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Caverne::factory(10)->create();
        Conte::factory(10)->create();
        LivreOr::factory(10)->create();
        MotCle::factory(1000)->create();

        foreach (Conte::all() as $conte) {
            $mot = \App\Models\MotCle::inRandomOrder()->first();
            $conte->motcles()->attach($mot);
        }
    }
}
