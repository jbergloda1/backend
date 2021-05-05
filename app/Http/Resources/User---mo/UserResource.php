<?php

namespace App\Http\Resources;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        return [
            'user_oid' => $this->user_oid,
            'email' => $this->email,
            'name' => $this->name,
            'role' => $this->role->name,
            'token' => $this->token,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
