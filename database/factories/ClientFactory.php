<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "phone" => $this->faker->phoneNumber(),
            "imei_number" => $this->faker->randomNumber(5, true),
            "image" => $this->faker->imageUrl()
        ];
    }
}
