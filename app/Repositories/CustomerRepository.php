<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class CustomerRepository
{
    public function search($inputs)
    {
        return Customer::
            when(isset($inputs['id']), function ($query) use ($inputs) {
                return $query->where('id', $inputs['id']);
            })
            ->when(isset($inputs['name']), function ($query) use ($inputs) {
                return $query->where('name', 'LIKE', '%' . $inputs['name'] . '%');
            })
            ->when(isset($inputs['email']), function ($query) use ($inputs) {
                return $query->where('email', 'LIKE', '%' . $inputs['email'] . '%');
            })
            ->orderBy('name', 'desc')
            ->paginate(10);
    }
    public function show($id)
    {
        return Customer::findOrFail($id);
    }
    public function destroy($id)
    {
        return Customer::findOrFail($id)
            ->delete();
    }
    public function store($inputs)
    {
        return Customer::create($inputs);
    }
}
