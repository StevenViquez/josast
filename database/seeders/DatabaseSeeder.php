<?php

namespace Database\Seeders;

use App\Models\VehicleBrand;
use App\Models\VehicleType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehicleTypeSeeder::class);
        $this->call(VehicleBrandSeeder::class);
        $this->call(VehicleSeeder::class);
    }
}
