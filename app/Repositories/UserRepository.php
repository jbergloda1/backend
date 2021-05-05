<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\SessionUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;


class UserRepository
{
    public function search($inputs)
    {
        return User::
        when(isset($inputs['code']), function ($query) use ($inputs) {
            return $query->where('code', 'LIKE', '%' . $inputs['code'] . '%');
        })
        ->when(isset($inputs['email']), function ($query) use ($inputs) {
            return $query->where('email', 'LIKE', '%' . $inputs['email'] . '%');
        })
        ->when(isset($inputs['name']), function ($query) use ($inputs) {
            return $query->where('name', 'LIKE', '%' . $inputs['name'] . '%');
        })
        ->when(isset($inputs['status']), function ($query) use ($inputs) {
            return $query->where('status', 'LIKE', '%' . $inputs['status'] . '%');
        })
        ->orderBy('id', 'asc')
        ->paginate(10);
    }
    public function store($inputs, $newNamefile)
    {
        return User::create([
            'code'          => $inputs['code'],
            'name'          => $inputs['name'],
            'dateofbirth'   => $inputs['dateofbirth'],
            'phone'         => $inputs['phone'],
            'address'       => $inputs['address'],
            'email'         => $inputs['email'],
            'img'           => $newNamefile,
            'password'      => Hash::make($inputs['password']),
            'id_role'          => $inputs['id_role'],
            'status'        => 1,
        ]);
    }
    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function get()
    {
        return SessionUser::where('user_id', auth()->id())->first();
    }

    public function update($inputs, $id)
    {
        return User::findOrFail($id)
            ->update([
                'code'          => $inputs['code'],
                'name'          => $inputs['name'],
                'dateofbirth'   => $inputs['dateofbirth'],
                'phone'         => $inputs['phone'],
                'address'       => $inputs['address'],
                'email'         => $inputs['email'],
                'img'           => $inputs['img'],
                'password'      => Hash::make($inputs['password']),
                'role'          => $inputs['role'],
                'status'        => $inputs['status'],
            ]);
    }
    public function updateNew($inputs, $id, $newNamefile)
    {
        return User::findOrFail($id)
            ->update([
                'code'          => $inputs['code'],
                'name'          => $inputs['name'],
                'dateofbirth'   => $inputs['dateofbirth'],
                'phone'         => $inputs['phone'],
                'address'       => $inputs['address'],
                'email'         => $inputs['email'],
                'img'           => $newNamefile,
                'password'      => Hash::make($inputs['password']),
                'role'          => $inputs['role'],
                'status'        => $inputs['status'],
            ]);
    }

    public function updateNoPass($inputs, $id)
    {
        return User::findOrFail($id)
            ->update([
                'code'          => $inputs['code'],
                'name'          => $inputs['name'],
                'dateofbirth'   => $inputs['dateofbirth'],
                'phone'         => $inputs['phone'],
                'address'       => $inputs['address'],
                'email'         => $inputs['email'],
                'img'           => $inputs['img'],
                'role'          => $inputs['role'],
                'status'        => $inputs['status'],
            ]);
    }

    public function updateNewNoPass($inputs, $id, $newNamefile)
    {
        return User::findOrFail($id)
        ->update([
            'code'          => $inputs['code'],
            'name'          => $inputs['name'],
            'dateofbirth'   => $inputs['dateofbirth'],
            'phone'         => $inputs['phone'],
            'address'       => $inputs['address'],
            'email'         => $inputs['email'],
            'img'           => $newNamefile,
            'role'          => $inputs['role'],
            'status'        => $inputs['status'],
        ]);
    }

    public function destroy($id)
    {
        return User::findOrFail($id)
            ->delete();
    }

    public function getUser()
    {
        return User::findOrFail(auth()->id());
    }

    public function login($inputs)
    {
        return SessionUser::create([
            'token' => Str::random(40),
            'refresh_token' => Str::random(40),
            'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
            'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
            'user_id' =>auth()->id()
        ]);
    }

    public function updateToken($id)
    {
        return SessionUser::find($id)->update([
            'token' => Str::random(40),
            'refresh_token' => Str::random(40),
            'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
            'refresh_token_expried' => date('Y-m-d H:i:s', strtotime('+360 day')),
            'user_id' =>auth()->id()
        ]);
    }

    public function deleteToken($id)
    {
        return SessionUser::find($id)->delete();
    }

    public function first($token)
    {
        $session = SessionUser::where('token', $token)->first();
        return User::findOrFail($session->user_id);
    }

    public function updateProfile($inputs, $id)
    {
        return User::findOrFail($id)
                ->update($inputs);
    }
}
