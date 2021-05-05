<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class SearchRequest extends Request
{
    public function rules()
    {
        return [
            'email' =>'string|nullable',
            'role_oid' => 'integer|nullable',
            'status' =>'boolean|nullable'
        ];
    }

    public function filter()
    {
        return $this->only([
            'email',
            'role_oid',
            'status',
        ]);
    }
}
