<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class UserRepository
{
    public function login($inputs)
    {
        try {
            return User::where([
                'email' => $inputs['email'],
                'password' => hash('sha256', $inputs['password']),
                'status' => true
            ])->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            throw new UserUnauthorizedException;
        }
    }

    public function search($inputs)
    {
        return User::with('role')
            ->when(isset($inputs['role_oid']), function ($query) use ($inputs) {
                return $query->where('role_oid', $inputs['role_oid']);
            })
            ->when(is_bool($inputs['status']), function ($query) use ($inputs) {
                return $query->where('status', $inputs['status']);
            })
            ->when(isset($inputs['email']), function ($query) use ($inputs) {
                return $query->where('email', 'ILIKE', '%' . $inputs['email'] . '%');
            })
            ->orderBy('user_oid', 'asc')
            ->paginate();
    }

    public function store($inputs)
    {
        return User::create($inputs);
    }

    public function show($userOid)
    {
        return User::findOrFail($userOid);
    }

    public function update($inputs)
    {
        if (empty($inputs['password'])) {
            unset($inputs['password']);
        }
        return User::findOrFail($inputs['user_oid'])
            ->update($inputs);
    }

    public function destroy($userOid)
    {
        return User::findOrFail($userOid)
            ->delete();
    }
}
