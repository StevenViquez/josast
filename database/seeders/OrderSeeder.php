<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new \App\Models\Order();
        $order->need_delivery = true;
        $order->delivery_fee = 800;
        $order->subtotal = 2500;
        $order->tax = 135;
        $order->total = 1000;
        $order->employee_id = 1;
        $order->customer_id = 3;
        $order->save();
    }
}
