<?php

namespace Database\Seeders;

use App\Models\Category;
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
            CategorySeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            ImageSeeder::class,
            ProductSizeSeeder::class,
            ColorProductSeeder::class,
            CategoryProductSeeder::class,
            OrderSeeder::class,
            OrderProductSeeder::class,
        ]);
    }
}
