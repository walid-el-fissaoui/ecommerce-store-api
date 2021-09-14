<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;
use App\Models\Product;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorsCount = Color::count();
        Product::all()->each(function($product) use($colorsCount){
            $take = random_int(1,$colorsCount);
            $colorsIds = Color::inRandomOrder()->take($take)->get()->pluck('id');
            $product->colors()->sync($colorsIds);
        });
    }
}
