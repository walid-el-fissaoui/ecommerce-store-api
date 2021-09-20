<?php

namespace Database\Seeders;

use App\Models\Sex;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::all()->each(function($product) {
            $take = random_int(1,2);
            $sexesIds = Sex::inRandomOrder()->take($take)->pluck('id');
            $product->sexes()->sync($sexesIds);
        });
    }
}
