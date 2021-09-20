<?php

namespace App\Models;

use App\Models\Sex;
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
use Illuminate\Database\Eloquent\Builder;
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
    public function sexes() {
        return $this->belongsToMany(Sex::class)->withTimestamps();
    }
    public function orders() {
        return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withTimestamps();
    }
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function scopeFilter(Builder $query) {
        if(request('title')) {
            $title = request('title');
            $query->where('title','like','%'.$title.'%');
        }
        if(request('categories')) {
                $categories = request('categories');
                $query->with('categories')->whereHas('categories',function($query) use($categories) {
                $query->whereIn('category_id',$categories);
            });
        }
        if(request('brands')) {
            $brands = request('brands');
            $query->with('brands')->whereHas('brands',function($query) use($brands) {
                $query->whereIn('brand_id',$brands);
            });
        }
        if(request('colors')) {
            $colors = request('colors');
            $query->with('colors')->whereHas('colors',function($query) use($colors) {
                $query->whereIn('color_id',$colors);
            });
        }
        if(request('sizes')) {
            $sizes = request('sizes');
            $query->with('sizes')->whereHas('sizes',function($query) use($sizes) {
                $query->whereIn('size_id',$sizes);
            });
        }
        if(request('sexes')) {
            $sexes = request('sexes');
            $query->with('sexes')->whereHas('sexes',function($query) use($sexes) {
                $query->whereIn('sex_id',$sexes);
            });
        }
        if(request('min_price')) {
            $minPrice = request('min_price');
            $query->where('price','>=',$minPrice);
        }
        if(request('max_price')) {
            $maxPrice = request('max_price');
            $query->where('price','<=',$maxPrice);
        }
        return $query;
    }
}
