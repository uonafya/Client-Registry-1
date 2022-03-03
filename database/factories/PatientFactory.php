<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'DOB' => $this->faker->DateTime,
            // 'gender' => $this->faker->randomElement(['male', 'female']),
            'Geolocation' => $this->faker->name,
            'Phone' => $this->faker->name,
            'ID_Number' => $this->faker->uuid,
            'CCC_Number' => $this->faker->uuid,
            'Nemis' => $this->faker->uuid,
            // 'Link_facility' => $this->faker->randomDigit,
            'Resident' => $this->faker->name,
            'Date_of_Transfer' => $this->faker->DateTime,
            
        ];
    }
}
