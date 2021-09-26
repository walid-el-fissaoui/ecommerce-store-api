<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_id','product_id','color_id','size_id'];

    public function purchase() {
        return $this->belongsTo(Purchase::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
    public function color() {
        return $this->belongsTo(Color::class);
    }
    public function size() {
        return $this->belongsTo(Size::class);
    }
}
