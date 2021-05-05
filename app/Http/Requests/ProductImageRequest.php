<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
    
    //Search Product
    public function searchRules():array
    {
        return [
            'id'        => 'integer|nullable',
            'name'      =>'string|nullable',
            'status'    =>'integer|nullable'
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'name',
            'status'
        ]);
    }

    //Store Product Image
    public function storeRules(): array
    {
        return [
            'product_id' => 'integer',
            'image'      => 'required|array|min:1|max:5 '
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'product_id',
            'image'
        ]);
    }
}
