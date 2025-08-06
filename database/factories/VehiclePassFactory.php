<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehiclePass>
 */
class VehiclePassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'control_no' => fake()->ean13(),
            'school_year' => date('Y') . '-' . (date('Y') + 1),
            'expiry_date' => '2026-03-30'
        ];
    }
}
