<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'=>fake()->firstName(),
            'lastName'=>fake()->lastName(),
            'address'=>fake()->address(),
            'phoneNumber'=>fake()->phoneNumber(),
            'userID'=>User::factory() ,
        ];
    }
}
