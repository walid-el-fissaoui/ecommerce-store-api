<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class ItemOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::all()->each(function($order) {
            $count = random_int(1,8);
            $order->items()->factory()->count($count)->create(['quantity' => random_int(1,5)]);
        });
    }
}
