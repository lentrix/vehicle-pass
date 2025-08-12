<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehiclePass;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'lentrix',
            'email' => 'lentrix@materdeicollege.com',
            'password' => bcrypt('system')
        ]);

        User::factory()->create([
            'name' => 'dayan',
            'email' => 'dayan@materdeicollege.com',
            'password' => bcrypt('system')
        ]);

        User::factory()->create([
            'name' => 'guard',
            'email' => 'guard@materdeicollege.com',
            'password' => bcrypt('system')
        ]);

        User::factory()->create([
            'name' => 'carl',
            'email' => 'carl@materdeicollege.com',
            'password' => bcrypt('system')
        ]);

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
