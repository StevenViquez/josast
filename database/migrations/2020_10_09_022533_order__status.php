<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_order', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time_status');
            $table->foreignId("status_id");
            $table->foreignId("order_id");
            $table->timestamps();

            $table->foreign("status_id")->references("id")->on("statuses");
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
        Schema::table("status_order", function (Blueprint $table) {
            $table->dropForeign("status_order_status_id_foreign");
            $table->dropForeign("status_order_order_id_foreign");
        });

        Schema::dropIfExists('status_order');
    }
}
