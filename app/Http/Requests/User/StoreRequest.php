<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class StoreRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|string|max:64',
            'password' => 'required|string|max:64',
            'name' => 'required|string',
            'role_oid' => 'required|integer',
            'charge_type' => 'integer|nullable',
            'charge_unit_price' => 'integer|nullable',
            'status' => 'required|boolean',
            'memo' => 'string|nullable',
        ];
    }

    public function filter()
    {
        return $this->only([
            'email',
            'password',
            'name',
            'role_oid',
            'charge_type',
            'charge_unit_price',
            'status',
            'phone_number',
            'memo',
        ]);
    }
}
