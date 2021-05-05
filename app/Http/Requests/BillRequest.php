<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
        if($this->isMethod('get')){
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
            'id' => 'integer|nullable',
            'id_bill' =>'integer|nullable',
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'id_bill'
        ]);
    }

    //Store Customer
    public function storeRules(): array
    {
        return [
            'payment' => 'required|string|min:0|max:50',
            //'note' => 'nullable'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'payment',
            'note'
        ]);
    }

    // //Update Category
    public function updateRules(): array
    {
        $id = $this->id;
        return [
            'quantity' => 'required|integer'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'quantity'
        ]);
    }
}
