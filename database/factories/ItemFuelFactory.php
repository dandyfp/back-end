<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemFuel>
 */
class ItemFuelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>Str::random(10),
            'name'=>fake()->name(),
            'description'=>fake()->word(15),
            'price'=>12000,
            'number_oktan'=>92,

        ];
    }
}
