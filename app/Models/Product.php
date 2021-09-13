<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use App\Models\Order;
use App\Models\Favorite;

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
    public function colors() {
        return $this->belongsToMany(Color::class)->withTimestamps();
    }
    public function sizes() {
        return $this->belongsToMany(Size::class)->withTimestamps();
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
