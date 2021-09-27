<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','color_id','size_id','quantity','image_url'];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function color() {
        return $this->belongsTo(Color::class);
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps()->withPivot("quantity");
    }

    public function scopeFilter(Builder $query) {
        if(request('ids')) {
            $ids = request('ids');
            $query->whereIn('id',$ids);
        }
        return $query;
    }
}
