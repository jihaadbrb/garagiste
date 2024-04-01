<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'=>fake()->userName(),
            'password' => Hash::make('password'),
            'email'=>fake()->email(),
            'isUser'=>fake()->boolean(50),
            'isMechanicien'=>fake()->boolean(10),
            'isAdmin'=>fake()->boolean(5),
        ];
    }
}
