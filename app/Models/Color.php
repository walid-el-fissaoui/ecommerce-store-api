<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withTimestamps();
    }
}
