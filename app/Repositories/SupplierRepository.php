<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\UserUnauthorizedException;
use Config;

class SupplierRepository
{
    public function search($inputs)
    {
        return Supplier::with('category')
        ->join('category', 'supplier.category_id', '=', 'category.id')
        ->select('supplier.id as id', 'category.name as category_id', 
               'supplier.name as name', 'supplier.address as address',
               'supplier.phone as phone', 'supplier.status as status')
        ->when(isset($inputs['id']), function ($query) use ($inputs) {
            return $query->where('supplier.id', $inputs['id']);
        })
        ->when(isset($inputs['name']), function ($query) use ($inputs) {
            return $query->where('supplier.name', 'LIKE', '%' . $inputs['name'] . '%');
        })
        ->orderBy('name', 'desc')
        ->paginate(10);
    }

    public function store($inputs)
    {
        return Supplier::create([
            'name'          => $inputs['name'],
            'category_id'   => $inputs['category_id'],
            'address'       => $inputs['address'],
            'phone'         => $inputs['phone'],
            'status'        => 1
        ]);
    }

    public function show($id)
    {
        return Supplier::find($id);
    }

    public function update($inputs, $id)
    {
        return Supplier::findOrFail($id)
            ->update($inputs);
    }
}
