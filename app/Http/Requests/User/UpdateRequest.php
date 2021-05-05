<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function rules()
    {
        return [
            'user_oid' => 'required|integer|exists:users,user_oid',
            'email' => 'required|string|max:64',
            'password' => 'string|max:64',
            'name' => 'required|string|max:64',
            'role_oid' => 'required|integer',
            'charge_type' => 'integer|nullable',
            'charge_unit_price' => 'numeric|nullable',
            'status' => 'required|boolean',
            'memo' => 'string|nullable',
        ];
    }

    public function filter()
    {
        return $this->only([
            'user_oid',
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

    public function all($keys = null)
    {
        $data = parent::all();
        $data['user_oid'] = $this->route('user_oid');
        $data['charge_unit_price'] = (float) $this->input('charge_unit_price');
        return $data;
    }
}
