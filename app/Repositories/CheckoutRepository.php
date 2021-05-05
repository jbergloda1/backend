<?php

namespace App\Repositories;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Bill;
use App\Http\Requests\Request;
use Cart;

class CheckoutRepository
{
    public function storeCart($product, $productSC, $inputs){
        return Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $inputs['qty'],
            'price' => $product->export_price,
            'options' => [
                'size' => $productSC[0]['size_id'],
                'color' => $productSC[0]['color_id'],
                'image' => $product->img,
                'amount' => $product->amount,
            ]
        ]);
    }
    public function getDataForBill($id){
        return Customer::where('customer_id', $id)->get();
    }
    public function storeCustomer($inputs)
    {
        return Customer::create([
            'name'      => $inputs['name'],
            'phone' => $inputs['phone'],
            'email' => $inputs['email'],
            'address' => $inputs['address'],
            'note' => $inputs['note'],
        ]);
    }
    public function showCustomer($id){
        return Customer::findOrFail($id);
    }
    public function updateCustomer($inputs, $id)
    {
        return Customer::findOrFail($id)
        ->update($inputs);
    }
    public function destroyCustomer(){

    }
    public function storeBill($inputs, $data, $total){
        return Bill::create([
            'data'  => $data['data'],
            'total_price'   => $total,
            'shipment' => $inputs,
            'payment'   => $inputs,
            'date_order' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => 2
        ]);
    }
    public function showBill($id){
        return Bill::findOrFail($id);
    }
    public function updateBill($request, $id)
    {
        $Customer = Bill::findOrFail($id);
        $Customer->status = $request->currStt;
        $Customer->save();
        return $Customer;
    }
    public function destroyBill($id){
        return Bill::findorfail($id)->destroy();
    }
}
