<?php

namespace App\Http\Resources\customer;
use App\Http\Resources\BaseResource;

class CustomerResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'email'     => $this->email,
            'phone'     => $this->phone,
            'address'   => $this->address
        ];
    }
}
