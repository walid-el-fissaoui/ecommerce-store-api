<?php

namespace App\Http\Resources;

use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => $this->price,
            'images'      => $this->items()->pluck('image_url'),
            'category'    => $this->category->title,
            'sizes'       => Size::whereIn('id',$this->items()->pluck('size_id'))->pluck('title'),
            'colors'      => Color::whereIn('id',$this->items()->pluck('color_id'))->pluck('color_hex'),
            'sexes'       => $this->sexes()->pluck('title'),
        ];
    }
}
