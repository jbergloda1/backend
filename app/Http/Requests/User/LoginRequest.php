<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function filter()
    {
        return $this->only(['email', 'password']);
    }
}
