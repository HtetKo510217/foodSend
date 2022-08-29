<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RestaurantOwner>
 */
class RestaurantOwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'email' => $this->faker->unique()->word(),
            'password' => 'owner',
            'address' => $this->faker->sentence(),
            'phone' => $this->faker->phoneNumber(),
        ];
    }
}
