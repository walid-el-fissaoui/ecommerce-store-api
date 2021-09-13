<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class Color extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
