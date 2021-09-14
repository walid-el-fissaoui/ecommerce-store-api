<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        Image::factory()->count(100)->make()->each(function($image) use($products) {
            $image->product_id = $products->random()->id;
            $image->save();
        });
    }
}
