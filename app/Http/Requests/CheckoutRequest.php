<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
    //Search Checkout
    public function searchRules():array
    {
        return [
            'id'        =>'integer|nullable',
            'data'      =>'string|nullable',
            'status'    =>'integer|nullable'
        ];
    }
    public function searchFilter()
    {
        return $this->only([
            'id',
            'data',
            'status'
        ]);
    }

    //Store Checkout
    public function storeRules(): array
    {
        return [
            // 'name'          => 'required|unique:Checkout|string|min:1|max:255',
            // //'amount'        => 'required|integer|min:0',
            // 'img'           => 'required|file|image',
            // 'note'          => 'required|string|min:1|max:1000',
            // 'import_price'  => 'required|integer|min:0',
            // 'export_price'  => 'integer:min:0',
            // 'sale'          => 'integer|max:100',
            // 'status'        => 'required|integer|min:0|max:2',
            // 'supplier_id'   => 'required|integer'
        ];
    }
    public function storeFilter()
    {
        return $this->only([
            'data',
            'total_price',
            'shipment',
            'payment',
            'date_order',
            'status',
        ]);
    }
    // public function storeCustomerRules(){
    //     return $this->only([
    //         'name',
    //         'phone',
    //         'email',
    //         'address',
    //         'note'
    //     ]);
    // }
    public function storeCustomerFT(){
        return $this->only([
            'name',
            'phone',
            'email',
            'address',
            'note'
        ]);
    }

    //Update Checkout
    public function updateRules(): array
    {
        //$id = $this->id;
        return [
            // 'name'          => 'required|string|min:1|max:255|unique:Checkout,name,'.$id,
            // 'amount'        => 'required|integer|min:0',
            // 'img'           => 'required|file|image',
            // 'note'          => 'required|string|min:1|max:1000',
            // 'import_price'  => 'required|integer|min:0',
            // 'export_price'  => 'integer:min:0',
            // 'sale'          => 'integer|max:100',
            // 'status'        => 'required|integer|min:0|max:2',
            // 'supplier_id'   => 'required|integer'
        ];
    }
    public function updateFilter()
    {
        return $this->only([
            'status',
        ]);
    }
}
