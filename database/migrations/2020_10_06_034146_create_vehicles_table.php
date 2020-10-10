<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("license_plate");
            $table->string("year");
            $table->foreignId("vehicle_type_id");
            $table->foreignId("vehicle_brand_id");
            $table->timestamps();


            $table->foreign("vehicle_type_id")->references("id")->on("vehicle_types");
            $table->foreign("vehicle_brand_id")->references("id")->on("vehicle_brands");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("vehicles", function (Blueprint $table) {
            $table->dropForeign("vehicles_vehicle_type_id_foreign");
            $table->dropForeign("vehicles_vehicle_brand_id_foreign");
        });

        Schema::dropIfExists('vehicles');
    }
}
