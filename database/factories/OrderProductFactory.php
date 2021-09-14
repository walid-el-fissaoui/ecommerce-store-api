<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        return [
            'quantity' => random_int(1,20),
            'product_id' => $product->id,
            'color_id' => $product->colors()->inRandomOrder()->first(),
            'size_id' => $product->sizes()->inRandomOrder()->first(),
            'order_id' => Order::inRandomOrder()->first()->id
        ];
    }
}
