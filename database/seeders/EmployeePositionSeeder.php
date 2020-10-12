<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Personal de Entrega
        $employeePosition = new \App\Models\EmployeePosition();
        $employeePosition->description = "Personal de Entrega";
        $employeePosition->save();

        //Vendedor
        $employeePosition = new \App\Models\EmployeePosition();
        $employeePosition->description = "Vendedor";
        $employeePosition->save();

        //Personal de preparacion de pedido
        $employeePosition = new \App\Models\EmployeePosition();
        $employeePosition->description = "Personal de preparación de pedido";
        $employeePosition->save();
    }
}
