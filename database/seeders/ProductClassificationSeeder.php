<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Jackets y Abrigos
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Jackets y Abrigos";
        $productClassification->save();

        //Pantalon de Dama
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Pantalon de Dama";
        $productClassification->save();

        //Pantalon de Caballero
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Pantalon de Caballero";
        $productClassification->save();

        //Ropa intima de Dama
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Ropa intima de Dama";
        $productClassification->save();

        //Ropa intima de Caballero
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Ropa intima de Caballero";
        $productClassification->save();

        //Ropa deportiva de Caballero
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Ropa deportiva de Caballero";
        $productClassification->save();

        //Ropa deportiva de Dama
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Ropa deportiva de Dama";
        $productClassification->save();

        //Zapato de Dama
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Zapato de Dama";
        $productClassification->save();

        //Zapato de Caballero
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Zapato de Caballero";
        $productClassification->save();

        //Vestidos y Enaguas
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Vestidos y Enaguas";
        $productClassification->save();

        //Short de Dama
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Short de Dama";
        $productClassification->save();

        //Short de Caballero
        $productClassification = new \App\Models\ProductClassification();
        $productClassification->description = "Short de Caballero";
        $productClassification->save();
    }
}
