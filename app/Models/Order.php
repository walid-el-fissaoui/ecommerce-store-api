<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->using(OrderProduct::class)->withTimestamps();
    }
    public function sizes() {
        return $this->belongsToMany(Color::class)->using(OrderProduct::class)->withTimestamps();
    }
    public function colors() {
        return $this->belongsToMany(Size::class)->using(OrderProduct::class)->withTimestamps();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
