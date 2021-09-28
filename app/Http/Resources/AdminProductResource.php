<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminProductResource extends JsonResource
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
            'title'     => substr($this->title,0,20) . '...',
            'price'     => $this->price,
            'sexes'     => $this->sexes()->pluck('title'),
            'quantity'  => $this->items()->pluck('quantity'),
            'orders'     => Order::whereIn('id',$this->items()->pluck('id'))->count(),
            'added'     => Carbon::parse($this->created_at)->format('Y/m/d')
        ];
    }
}
