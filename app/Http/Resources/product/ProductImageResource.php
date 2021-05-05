<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseResource;

class ProductImageResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'image'         => $this->image,
            'product_id'    => $this->product_id,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at
        ];
    }
}
