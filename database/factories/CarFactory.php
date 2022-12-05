<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\manufacturer>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'model' => $this->faker->word,
            'desc' => $this->faker->text(100),
            'colour' => $this->faker->word,
            'user_id' => 2,
            'car_image' => $this->faker->image('public/storage', ('merc.jpg'), 250,250)

        ];
    }
}