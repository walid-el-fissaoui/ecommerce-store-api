<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Size;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizesCount = Size::count();
        Product::all()->each(function($product) use($sizesCount){
            $take = random_int(1,$sizesCount);
            $sizesIds = Size::inRandomOrder()->take($take)->get()->pluck('id');
            $product->sizes()->sync($sizesIds);
        });
    }
}
