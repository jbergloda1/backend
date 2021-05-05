<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductColorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
       if($this->isMethod('post')){
            return $this->storeRules();
        }elseif($this->isMethod('put')){
            return $this->updateRules();
        }
    }

    //Store Product Image
    public function storeRules(): array
    {
        return [
            'product_id' => 'integer',
            'color'      => 'required|array|min:1|max:10'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'product_id',
            'color'
        ]);
    }
}