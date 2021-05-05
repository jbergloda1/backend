<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
    //Search Category
    public function searchRules():array
    {
        return [
            'id'    => 'integer|nullable',
            'email' => 'string|nullable',
            'name'  =>'string|nullable',
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'email',
            'name'
        ]);
    }

    //Store Customer
    public function storeRules(): array
    {
        return [
            // 'email'     => 'required|email|min:0|max:50',
            // 'name'      => 'required|string|min:0|max:30',
            // 'phone'     => 'required|numeric',
            // 'address'   => 'required|string|min:0|max:255',
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'email',
            'name',
            'phone',
            'address'
        ]);
    }

    // //Update Category
    // public function updateRules(): array
    // {
    //     $id = $this->id;
    //     return [
    //         'name' => 'required||string|min:1|max:100|unique:category,name,'.$id,
    //         'status' => 'integer|max:2'
    //     ];
    // }
    // public function updateFilter()
    // {
    //     return $this->only([
    //         'name',
    //         'status'
    //     ]);
    // }
}
