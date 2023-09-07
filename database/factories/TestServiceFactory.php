<?php

namespace Database\Factories;

use App\Models\Catagory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestService>
 */
class TestServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catagory_id' => 1,
            'test_name' => $this->faker->sentence(6),
            'price' => rand(5000, 15000),
        ];
    }
}
