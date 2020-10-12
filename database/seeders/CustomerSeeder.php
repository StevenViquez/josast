<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Customer #1
        $customer = new \App\Models\Customer();
        $customer->name = "Jose";
        $customer->second_name = "Benavides";
        $customer->email = "jose15@gmail.com";
        $customer->address = "200 metros este 50 sur de la escuela de la Aurora, Ulloa, Heredia, CR";
        $customer->save();

        //Customer #2
        $customer = new \App\Models\Customer();
        $customer->name = "Vivian";
        $customer->second_name = "Perez";
        $customer->email = "vperez@gmail.com";
        $customer->address = "200 metros este 50 sur del Parque Central de San Jose, San Jose, San Jose, CR";
        $customer->save();

        //Customer #3
        $customer = new \App\Models\Customer();
        $customer->name = "Vinicio";
        $customer->second_name = "Campos";
        $customer->email = "vcampos@gmail.com";
        $customer->address = "50 metros sur de el estadio nacional de Costa Rica, Sabana, San Jose, CR";
        $customer->save();
    }
}
