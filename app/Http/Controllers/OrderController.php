<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'products' => 'required'
        ]);
        $userId = $request->input('user_id');
        $order = Order::create(['user_id' => $userId]);
        $order = Order::find($order->id);
        $products = $request->input('products');
        foreach ($products as $product) {
            $order->products()->attach($product['product_id'],['color_id' => $product['color_id'], 'size_id' => $product['size_id'], 'quantity' => $product['quantity']]);
        }
        return $order->products;
    }
}
