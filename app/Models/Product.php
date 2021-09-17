<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Image;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','description','price'];

    public function images(){
        return $this->hasMany(Image::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    public function brands() {
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }
    public function colors() {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
    public function sizes() {
        return $this->belongsToMany(Size::class)->withTimestamps();
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withTimestamps();
    }
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
