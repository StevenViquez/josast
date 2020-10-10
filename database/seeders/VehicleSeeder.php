<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vehicle #1
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "200120";
        $vehicle->year = "2020";
        $vehicle->vehicletype_id = 1;
        $vehicle->vehiclebrand_id = 1;
        $vehicle->save();
        //Vehicle #2
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "300119";
        $vehicle->year = "2015";
        $vehicle->vehicletype_id = 2;
        $vehicle->vehiclebrand_id = 2;
        $vehicle->save();
        //Vehicle #3
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "150119";
        $vehicle->year = "2008";
        $vehicle->vehicletype_id = 3;
        $vehicle->vehiclebrand_id = 3;
        $vehicle->save();
        //Vehicle #4
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "204519";
        $vehicle->year = "1998";
        $vehicle->vehicletype_id = 4;
        $vehicle->vehiclebrand_id = 4;
        $vehicle->save();
        //Vehicle #5
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "200305";
        $vehicle->year = "2019";
        $vehicle->vehicletype_id = 5;
        $vehicle->vehiclebrand_id = 5;
        $vehicle->save();
        //Vehicle #6
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "500139";
        $vehicle->year = "2016";
        $vehicle->vehicletype_id = 6;
        $vehicle->vehiclebrand_id = 6;
        $vehicle->save();
        //Vehicle #7
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "850119";
        $vehicle->year = "2007";
        $vehicle->vehicletype_id = 7;
        $vehicle->vehiclebrand_id = 7;
        $vehicle->save();
        //Vehicle #8
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "680119";
        $vehicle->year = "2014";
        $vehicle->vehicletype_id = 8;
        $vehicle->vehiclebrand_id = 8;
        $vehicle->save();
        //Vehicle #9
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "950119";
        $vehicle->year = "2013";
        $vehicle->vehicletype_id = 9;
        $vehicle->vehiclebrand_id = 9;
        $vehicle->save();

        //Vehicle #10
        $vehicle = new \App\Models\Vehicle();
        $vehicle->license_plate = "258619";
        $vehicle->year = "2007";
        $vehicle->vehicletype_id = 10;
        $vehicle->vehiclebrand_id = 10;
        $vehicle->save();
    }
}
