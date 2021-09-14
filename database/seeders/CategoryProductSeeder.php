<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class CategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesCount = Category::count();
        Product::all()->each(function($product) use($categoriesCount) {
            $take = random_int(1,$categoriesCount);
            $categoriesIds = Category::inRandomOrder()->take($take)->get()->pluck('id');
            $product->categories()->sync($categoriesIds);
        });
    }
}
