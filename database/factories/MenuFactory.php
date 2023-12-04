<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'food_id' => $this->faker->uuid(),
            'food_name' => $this->faker->name(),
            'food_type' => $this->faker->randomElement(['Main Course', 'Beverages', 'Desserts']),
            'food_price' => $this->faker->numberBetween(1, 100),
            'brief_desc' => $this->faker->realTextBetween(20, 40),
            'about_food' => $this->faker->realTextBetween(40, 60),
            'food_img' => $this->faker->image('public/storage/images',640,480, null, false)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
}
