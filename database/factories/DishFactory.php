<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dish>
 */
class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dish_name' => fake()->name(),
            'dish_detail' => 'Something Something',
            'dish_image' => 'Something.jpg',
            'dish_status' => '1',
            'dish_price' => rand(100, 500),
            'restaurant_id' =>  User::factory()->create()->user_id,
        ];
    }
}
