<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FeatureProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feature_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id");
            $table->foreignId("product_feature_id");
            $table->timestamps();

            $table->foreign("product_id")->references("id")->on("products");
            $table->foreign("product_feature_id")->references("id")->on("product_features");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("feature_product", function (Blueprint $table) {
            $table->dropForeign("feature_product_product_id_foreign");
            $table->dropForeign("feature_product_product_feature_id_foreign");
        });

        Schema::dropIfExists('feature_product');
    }
}
