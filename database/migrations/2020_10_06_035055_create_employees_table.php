<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("second_name");
            $table->string("email");
            $table->string("phone_number");
            $table->double('salary', 8, 2);
            $table->timestamp('hired_date');
            $table->boolean('is_enabled');
            $table->foreignId("vehicle_id");
            $table->foreignId("employeeposition_id");
            $table->timestamps();


            $table->foreign("vehicle_id")->references("id")->on("vehicles");
            $table->foreign("employeeposition_id")->references("id")->on("employee_positions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("employees", function (Blueprint $table) {
            $table->dropForeign("employees_vehicle_id_foreign");
            $table->dropForeign("employees_employeeposition_id_foreign");
        });
        Schema::dropIfExists('employees');
    }
}
