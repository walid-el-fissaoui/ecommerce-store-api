<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;

class BrandProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandsCount = Brand::count();
        Product::all()->each(function($product) use($brandsCount) {
            $take = random_int(1,$brandsCount);
            $BrandsIds = Brand::inRandomOrder()->take($take)->get()->pluck('id');
            $product->brands()->sync($BrandsIds);
        });
    }
}
