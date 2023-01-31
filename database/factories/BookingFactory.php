<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => rand(1, 100),
            'address_id' => rand(1, 100),
            'from' => $this->faker->time(),
            'to' => $this->faker->time(),
            'date' => $this->faker->date()
        ];
    }
}
