<?php

namespace App\Http\Resources\bill;
use App\Http\Resources\BaseCollection;

class DetailCollection extends BaseCollection
{
    public function toArray($request)
    {
        return $this->map(function ($billDetail) {
            return [
                'id_bill'   => $billDetail->id_bill,
                'img'       => $billDetail->img,
                'name'      => $billDetail->name,
                'size'     => $billDetail->size ,
                'color'     => $billDetail->color,
                'price'     => $billDetail->price,
                'amount'    => $billDetail->amount
            ];
        });
    }
}