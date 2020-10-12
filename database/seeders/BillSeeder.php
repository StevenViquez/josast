<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Customer #3
        $bill = new \App\Models\Bill();
        $bill->date_of_issue = '2020-10-11 23:08:58';
        $bill->order_id = 1;
        $bill->save();
    }
}
