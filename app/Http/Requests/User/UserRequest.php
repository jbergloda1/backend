<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    public function rules()
    {
        return [
            'user_oid'=>'required|integer|exists:users,user_oid'
        ];
    }

    public function filter()
    {
        return $this->only([
            'user_oid'
        ]);
    }

    public function all($keys = null)
    {
        $data = parent::all();
        $data['user_oid'] = $this->route('user_oid');
        return $data;
    }
}
