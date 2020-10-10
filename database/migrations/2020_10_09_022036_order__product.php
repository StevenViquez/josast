<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->integer("quantity");
            $table->foreignId("product_id");
            $table->foreignId("order_id");
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("order_id")->references("id")->on("orders");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("order_product", function (Blueprint $table) {
            $table->dropForeign("order_product_product_id_foreign");
            $table->dropForeign("order_product_order_id_foreign");
        });

        Schema::dropIfExists('order_product');
    }
}
