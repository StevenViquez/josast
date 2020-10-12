<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Pendiente
        $status = new \App\Models\Status();
        $status->description = "Pendiente";
        $status->save();

        //Facturado
        $status = new \App\Models\Status();
        $status->description = "Facturado";
        $status->save();

        //Empacando
        $status = new \App\Models\Status();
        $status->description = "Empacado";
        $status->save();

        //En transito
        $status = new \App\Models\Status();
        $status->description = "En transito";
        $status->save();

        //Entregado
        $status = new \App\Models\Status();
        $status->description = "Entregado";
        $status->save();
    }
}
