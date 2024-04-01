<?php

namespace Database\Factories;

use App\Models\reparation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\facture>
 */
class factureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'additionalCharges'=>fake()->randomFloat(2,0,1000),
            'totalAmout'=>fake()->randomFloat(5),
            'repairID'=>reparation::factory(),
        ];
    }
}
