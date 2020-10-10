<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //4x4
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "4x4";
        $vehicleType->save();
        //Van
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Van";
        $vehicleType->save();
        //Pickup
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Pickup";
        $vehicleType->save();
        //Compact
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Compact";
        $vehicleType->save();
        //Truck
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Truck";
        $vehicleType->save();
        //Minivan
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Minivan";
        $vehicleType->save();
        //Suv
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Suv";
        $vehicleType->save();
        //Motorcycle
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Motorcycle";
        $vehicleType->save();
        //Hatchback
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Hatchback";
        $vehicleType->save();
        //Scooter
        $vehicleType = new \App\Models\VehicleType();
        $vehicleType->description = "Scooter";
        $vehicleType->save();
    }
}
