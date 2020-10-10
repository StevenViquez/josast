<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehicleBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Toyota
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Toyota";
        $vehicleBrand->save();
        //Honda
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Honda";
        $vehicleBrand->save();
        //Mazda
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Mazda";
        $vehicleBrand->save();
        //Jaguar
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Jaguar";
        $vehicleBrand->save();
        //Nissan
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Nissan";
        $vehicleBrand->save();
        //Ford
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Ford";
        $vehicleBrand->save();
        //Suzuki
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Suzuki";
        $vehicleBrand->save();
        //KTM
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "KTM";
        $vehicleBrand->save();
        //Ducati
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Ducati";
        $vehicleBrand->save();
        //Yamaha
        $vehicleBrand = new \App\Models\VehicleBrand();
        $vehicleBrand->description = "Yamaha";
        $vehicleBrand->save();
    }
}
