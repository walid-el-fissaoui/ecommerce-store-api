<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            SexSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class,
            ProductSeeder::class,
            ProductSexSeeder::class,
            ItemSeeder::class,
            ItemOrderSeeder::class
        ]);
    }
}
