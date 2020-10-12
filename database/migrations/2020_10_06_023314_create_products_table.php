<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->string("url_picture");
            $table->double('cost', 8, 2);
            $table->boolean('is_enabled');
            $table->foreignId("productclassification_id");
            $table->foreignId("productbrand_id");
            $table->timestamps();

            $table->foreign("productclassification_id")->references("id")->on("product_classifications");
            $table->foreign("productbrand_id")->references("id")->on("product_brands");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("products", function (Blueprint $table) {
            $table->dropForeign("products_productclassification_id_foreign");
            $table->dropForeign("products_productbrand_id_foreign");
        });
        Schema::dropIfExists('products');
    }
}
