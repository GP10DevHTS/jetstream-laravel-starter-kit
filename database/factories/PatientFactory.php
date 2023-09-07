<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    protected $model = Patient::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'full_name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'gender' => 'male',
            'birth_date' => $this->faker->dateTimeBetween('-50 years', now()),
            'residence' => $this->faker->address(),
        ];
    }
}
