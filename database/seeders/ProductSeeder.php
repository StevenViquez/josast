<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Models\Product();
        $product->name = "Abrigo";
        $product->description = "Abrigo Nike color verde y azul, disponible en diferentes tallas.";
        $product->url_picture = "";
        $product->cost = 5000;
        $product->is_enabled = true;
        $product->productclassification_id = 1;
        $product->productbrand_id = 1;
        $product->save();

        $product = new \App\Models\Product();
        $product->name = "Vestido";
        $product->description = "Vestido de dama Levis, colorido a la moda.";
        $product->url_picture = "";
        $product->cost = 8000;
        $product->is_enabled = true;
        $product->productclassification_id = 10;
        $product->productbrand_id = 5;
        $product->save();

        $product = new \App\Models\Product();
        $product->name = "Tenis";
        $product->description = "Tenis deportivas Nike, comodas para practicar deporte.";
        $product->url_picture = "";
        $product->cost = 45000;
        $product->is_enabled = true;
        $product->productclassification_id = 1;
        $product->productbrand_id = 4;
        $product->save();
    }
}
