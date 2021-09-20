<?php

namespace App\Http\Resources;

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
            'images'      => ProductImageResource::collection($this->images()->get()),
            'categories'  => CategoryResource::collection($this->categories),
            'sizes'       => ProductSizeResource::collection($this->sizes),
            'colors'      => ProductColorResource::collection($this->colors),
            'sexes'       => SexResource::collection($this->sexes),
        ];
    }
}
