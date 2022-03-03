<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class facilityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'facility_name' => $this->faker->name,
            'MFL_CODE' =>  $this->faker->uuid,
        ];
    }
}
