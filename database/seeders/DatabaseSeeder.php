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
        $this->call(ProductBrandSeeder::class);
        $this->call(ProductClassificationSeeder::class);
        $this->call(ProductFeatureSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(EmployeePositionSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(BillSeeder::class);
    }
}
