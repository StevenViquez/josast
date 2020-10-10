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
            $table->foreignId("product_classification_id");
            $table->foreignId("product_brand_id");
            $table->timestamps();

            $table->foreign("product_classification_id")->references("id")->on("product_classifications");
            $table->foreign("product_brand_id")->references("id")->on("product_brands");
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
            $table->dropForeign("products_product_classification_id_foreign");
            $table->dropForeign("products_product_brand_id_foreign");
        });
        Schema::dropIfExists('products');
    }
}
