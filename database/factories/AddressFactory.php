<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'location' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['booking', 'delivery']),
            'additional_info' => $this->faker->paragraph(2)
        ];
    }
}
