<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(1000, 50000),
            'reference_no' => $this->faker->uuid(),
            'client_id' => rand(1, 100)
        ];
    }
}
