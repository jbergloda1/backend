<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        if ($this->isMethod('get')){
            return $this->searchRules();
        }elseif($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }
    //Search Supplier
    public function searchRules():array
    {
        return [
            'id' => 'integer|nullable',
            'name' =>'string|nullable'
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'name'
        ]);
    }

    //Store Supplier
    public function storeRules(): array
    {
        return [
            'category_id'   => 'required|integer',
            'name'          => 'required|unique:supplier|string|min:1|max:100',
            'address'       => 'required|string|min:1|max:255',
            'phone'         => 'required|numeric',
            'status'        => 'integer|max:1'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'category_id',
            'name',
            'address',
            'phone',
            'status'
        ]);
    }

    //Update Supplier
    public function updateRules(): array
    {
        $id = $this->id;
        return [
            'category_id'   => 'required|integer',
            'name'          => 'required|string|min:1|max:100|unique:supplier,name,'.$id,
            'address'       => 'required|string|min:1|max:255',
            'phone'         => 'required|numeric',
            'status'        => 'required|integer|max:2'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'category_id',
            'name',
            'address',
            'phone',
            'status'
        ]);
    }
}
