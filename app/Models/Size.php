<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Size extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function scopeFilter(Builder $query) {
        if(request('ids')) {
            $ids = request('ids');
            $query->whereIn("id",$ids);
        }
        return $query;
    }
}
