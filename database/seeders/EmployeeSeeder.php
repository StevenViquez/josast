<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Employee #1
        $employee = new \App\Models\Employee();
        $employee->name = "Steven";
        $employee->second_name = "Viquez";
        $employee->email = "sviquez48@gmail.com";
        $employee->phone_number = "84810876";
        $employee->salary = 700000;
        $employee->hired_date = '2020-10-11 20:11:06';
        $employee->is_enabled = true;
        $employee->vehicle_id = 1;
        $employee->employeeposition_id = 1;
        $employee->save();

        //Employee #2
        $employee = new \App\Models\Employee();
        $employee->name = "Maureen";
        $employee->second_name = "Mora";
        $employee->email = "mmora@gmail.com";
        $employee->phone_number = "88961520";
        $employee->salary = 700000;
        $employee->hired_date = '2020-10-11 20:11:06';
        $employee->is_enabled = true;
        $employee->vehicle_id = 5;
        $employee->employeeposition_id = 2;
        $employee->save();

        //Employee #1
        $employee = new \App\Models\Employee();
        $employee->name = "Sharon";
        $employee->second_name = "Viquez";
        $employee->email = "sharonviquez@gmail.com";
        $employee->phone_number = "93681520";
        $employee->salary = 700000;
        $employee->hired_date = '2020-10-11 20:11:06';
        $employee->is_enabled = true;
        $employee->vehicle_id = 6;
        $employee->employeeposition_id = 3;
        $employee->save();
    }
}
