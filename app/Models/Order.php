<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function items() {
        return $this->belongsToMany(Item::class)->withTimestamps()->withPivot("quantity");
    }
}
