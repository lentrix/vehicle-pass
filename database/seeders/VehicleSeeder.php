<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Vehicle;
use App\Models\VehiclePass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owner::factory(100)->create();

        foreach(Owner::get() as $owner) {
            Vehicle::factory()->create([
                'owner_id'=>$owner->id
            ]);
        }

        foreach(Vehicle::get() as $vehicle) {
            VehiclePass::factory()->create(['vehicle_id'=>$vehicle->id]);
        }
    }
}
