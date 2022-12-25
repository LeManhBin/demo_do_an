<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class thongkeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_hoa_don' => $this->faker->numberBetween(1, 500),
            'tong_thanh_toan' => $this->faker->numberBetween(1000000, 100000000),
            'created_at'    => $this->faker->dateTimeBetween('-10 years', 'now'),
        ];
    }
}
