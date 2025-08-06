<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $vehicles = [
            ['make'=>'Toyota', 'model'=>'Vios'],
            ['make'=>'Honda', 'model'=>'Civic'],
            ['make'=>'Ford', 'model'=>'Focus'],
            ['make'=>'Nissan', 'model'=>'Sentra'],
            ['make'=>'Mitsubishi', 'model'=>'Mirage'],
            ['make'=>'Hyundai', 'model'=>'Accent'],
            ['make'=>'Chevrolet', 'model'=>'Spark'],
            ['make'=>'Kia', 'model'=>'Rio'],
            ['make'=>'Mazda', 'model'=>'3'],
            ['make'=>'Suzuki', 'model'=>'Swift'],
            ['make'=>'Volkswagen', 'model'=>'Jetta'],
        ];

        $vehicle = $vehicles[array_rand($vehicles)];

        return [
            'vehicle_make' => $vehicle['make'],
            'vehicle_model' => $vehicle['model'],
            'plate_no' => fake()->regexify('[A-Z]{3}-[0-9]{4}'),
            'registration_date' => now()->subMonths(rand(9, 24))->subDays(rand(0, 30))->toDateString(),
        ];
    }
}
