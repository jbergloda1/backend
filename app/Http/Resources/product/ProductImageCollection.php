<?php

namespace App\Http\Resources\product;
use App\Http\Resources\BaseCollection;

class ProductImageCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($product) {
            return [
                'image'        => $product->image,
                'product_id'   => $product->product_id,
                'created_at'   => $product->created_at,
                'updated_at'   => $product->updated_at,
            ];
        });
    }
}
