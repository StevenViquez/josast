<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Nike
        $productBrand = new \App\Models\ProductBrand();
        $productBrand->description = "Nike";
        $productBrand->save();

        //Puma
        $productBrand = new \App\Models\ProductBrand();
        $productBrand->description = "Puma";
        $productBrand->save();

        //Calvin Kein
        $productBrand = new \App\Models\ProductBrand();
        $productBrand->description = "Calvin Kein";
        $productBrand->save();

        //Adidas
        $productBrand = new \App\Models\ProductBrand();
        $productBrand->description = "Adidas";
        $productBrand->save();

        //Levis
        $productBrand = new \App\Models\ProductBrand();
        $productBrand->description = "Levis";
        $productBrand->save();
    }
}
