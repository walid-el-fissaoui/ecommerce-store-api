<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'id'       => $this->id,
            'image'    => $this->image_url,
            'title'    => $this->product->title,
            'price'    => $this->product->price,
            'color'    => $this->color->color_hex,
            'size'     => $this->size->title,
            'quantity' => $this->quantity
        ];
    }
}
