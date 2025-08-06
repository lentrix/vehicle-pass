<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'address' => fake()->address,
            'contact_no' => fake()->phoneNumber,
            'license_no' => fake()->ean13,
            'expiry_date' => fake()->dateTimeBetween('+3 months', '+2 years')->format('Y-m-d'),
        ];
    }
}
