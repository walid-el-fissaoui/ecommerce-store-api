<?php

namespace App\Http\Resources;

use App\Http\Resources\ProductImageResource;
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
            'image'     => new ProductImageResource($this->images()->first()),
            'colors'    => ProductColorResource::collection($this->colors)
            // 'sizes'    => ProductSizeResource::collection($this->sizes)
        ];
    }
}
