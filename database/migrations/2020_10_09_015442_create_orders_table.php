<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->boolean('need_delivery');
            $table->double('delivery_fee', 8, 2);
            $table->double('subtotal', 8, 2);
            $table->double('tax', 8, 2);
            $table->double('total', 8, 2);
            $table->foreignId("employee_id");
            $table->foreignId("customer_id");
            $table->timestamps();

            $table->foreign("employee_id")->references("id")->on("employees");
            $table->foreign("customer_id")->references("id")->on("customers");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("orders", function (Blueprint $table) {
            $table->dropForeign("orders_customer_id_foreign");
            $table->dropForeign("orders_employee_id_foreign");
        });

        Schema::dropIfExists('orders');
    }
}
