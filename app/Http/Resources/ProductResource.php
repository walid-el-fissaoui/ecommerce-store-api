<?php

namespace App\Http\Resources;

use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'        => $this->id,
            'title'     => $this->title,
            'price'     => $this->price,
            'image' => $this->items()->first()->image_url,
            'colors' => Color::whereIn('id',$this->items()->pluck('color_id'))->pluck('color_hex'),
            'category' => $this->category->title,
        ];
    }
}
