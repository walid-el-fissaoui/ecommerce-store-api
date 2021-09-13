<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;

class Order extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
    public function sizes() {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
    public function colors() {
        return $this->belongsToMany(Size::class)->withTimestamps();
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
