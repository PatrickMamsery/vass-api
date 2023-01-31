<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "client_id" => rand(1, 100),
            "make_id" => rand(1, 100),
            "model_id" => rand(1, 100),
            "manufacture_year" => $this->setYear()
        ];
    }

    public function setYear()
    {
        $_=[date("Y", strtotime("-5 year")), date("Y", strtotime("-3 year")), date('Y'), date("Y",strtotime("-2 year"))];
        return $_[rand(0,3)];
    }
}
