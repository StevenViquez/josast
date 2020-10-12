<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Deportiva
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Deportiva";
        $productFeature->save();

        //Fresca
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Fresca";
        $productFeature->save();

        //Comfortable
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Comfortable";
        $productFeature->save();

        //Barata
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Barata";
        $productFeature->save();

        //Lana
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Lana";
        $productFeature->save();

        //Formal
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Formal";
        $productFeature->save();

        //Casual
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Casual";
        $productFeature->save();

        //Playa
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Playa";
        $productFeature->save();

        //Montaña
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Montaña";
        $productFeature->save();

        //Verano
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Verano";
        $productFeature->save();

        //Invierno
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Invierno";
        $productFeature->save();

        //Calzado para correr
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Calzado para correr";
        $productFeature->save();

        //Calzado para caminatas
        $productFeature = new \App\Models\ProductFeature();
        $productFeature->description = "Calzado para caminatas";
        $productFeature->save();
    }
}
