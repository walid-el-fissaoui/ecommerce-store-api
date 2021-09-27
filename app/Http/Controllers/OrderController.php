<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
            'items' => 'required'
        ]);
        $userId = $request->input('user_id');
        $items = collect($request->input("items"));
        $formattedItems = [];
        foreach ($items as $item) {
            $formattedItems[$item['item_id']] = ['quantity' => $item['quantity']];
        }
        $order = Order::create(['user_id' => $userId]);
        $order->items()->sync($formattedItems);
        return $order;
    }
}
