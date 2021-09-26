<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        return [
            'purchase_id' => Purchase::inRandomOrder()->first()->id,
            'product_id' => $product->id,
            'color_id' => $product->colors()->inRandomOrder()->first(),
            'size_id' => $product->sizes()->inRandomOrder()->first(),
            'quantity' => random_int(1,20),
        ];
    }
}
