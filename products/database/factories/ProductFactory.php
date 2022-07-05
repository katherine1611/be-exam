<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text($maxNbChars = 50),
            'category' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'dateandtime' => $this->faker->dateTime(),
            'images' => 'https://source.unsplash.com/random'
        ];
    }
}
