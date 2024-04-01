<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\piece>
 */
class pieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'partname'=>fake()->text(),
            'partreference'=>fake()->text(),
            'supplier'=>fake()->text(),
            'price'=>fake()->randomFloat(5)
        ];
    }
}
