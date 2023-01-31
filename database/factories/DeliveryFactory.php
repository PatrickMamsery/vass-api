<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'product_id' => rand(1, 100),
            'client_id' => rand(1, 100),
            'address_id' => rand(1, 100),
            'status' => $this->faker->randomElement(['PENDING', 'DELIVERED', 'CANCELED'])
        ];
    }
}
