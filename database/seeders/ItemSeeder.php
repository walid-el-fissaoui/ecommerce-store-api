<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::all()->each(function($product) {
            $count = random_int(1,5);
            Item::factory()->count($count)->create(['product_id' => $product->id]);
        });
    }
}
