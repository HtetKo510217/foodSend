<?php

namespace Database\Factories;

use App\Models\RestaurantOwner;
use App\Models\Township;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
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
            'email' => $this->faker->unique()->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->sentence(),
            'opening_duration' => $this->faker->sentence(),
            'township_id' => Township::factory(),
            'restaurant_owner_id' => RestaurantOwner::factory(),
        ];
    }
}
