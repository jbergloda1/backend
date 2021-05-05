<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\product\ProductSizeColorResource;
use App\Repositories\CustomerRepository;
use App\Repositories\BillRepository;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Resources\bill\BillResource;
use App\Http\Resources\bill\StatisticalResource;
use App\Http\Resources\bill\BillDetailResource;
use App\Http\Resources\bill\BillDetailCollection;
use App\Http\Resources\bill\BillCollection;
use App\Repositories\ProductRepository;
use App\Http\Resources\customer\CustomerCollection;
use App\Http\Resources\customer\CustomerResource;
USE App\Http\Resources\bill\DetailCollection;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

class BillController
{
    private $billRepository;
    private $customerRepository;
    private $productRepository;

    public function __construct(BillRepository $billRepository, CustomerRepository $customerRepository, ProductRepository $productRepository)
    {
        $this->billRepository = $billRepository;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }
    public function search(BillRequest $request)
    {
        return new BillCollection($this->billRepository->search($request->searchFilter()));
    }
    public function store(Request $request, CustomerRequest $customerRequest, BillRequest $billRequest)
    {
        $items = session('cart');
        if(!empty($items)){
                $totalPrice      = 0;
                $totalQuantity   = 0;
                foreach($items as $rowCart){
                    $totalPrice      += $rowCart['price']*$rowCart['quantity'];
                    $totalQuantity   += $rowCart['quantity'];
                }
                $cart = [
                    'items' => $items,
                    'total_price'=> $totalPrice,
                    'total_quantity' => $totalQuantity
                ];
                $customer = new CustomerResource($this->customerRepository->store($customerRequest->storeFilter()));
                if($customer ==true){
                    $bill = new BillResource($this->billRepository->store($billRequest->storeFilter(), $customer->id, $cart));
                    if($bill == true){
                        foreach($cart['items'] as $rowCart){
                            $PSCdata = $this->billRepository->showPSC($rowCart);
                            $this->billRepository->storeBillDetail($bill->id, $PSCdata, $rowCart);   
                        }
                        $showBillDetail = new DetailCollection($this->billRepository->showBillDetail($bill->id));
                       
                        $request->session()->forget('cart');
                        return [
                            'customer' => $customer,
                            'bill' => $bill, 
                            'billDetail' => $showBillDetail
                        ];
                    }
                }
                // return [
                //     'customer_id' => $customer->name,
                //     'bill_id' => $bill->id
                // ];
                // return Mail::to("jbergloda1@gmail.com")->send(new TestMail($Details));
        }
    }
    public function show($id)
    {
        $bill = new BillResource($this->billRepository->showBill($id));
        $billDetail = new BillDetailCollection($this->billRepository->showBillDetail($id));
         return [
                'data' => $bill, 
                'bill_detail' => $billDetail
            ];
    }
    public function showBillDetail($id){
        $bill = new BillResource($this->billRepository->showBill($id));
        $customerInfo = new CustomerResource($this->customerRepository->show($bill->customer_id));
        $billDetail = new DetailCollection($this->billRepository->showBillDetail($id));
        return [
            'Customer'      => $customerInfo, 
            'BillDetail'    => $billDetail
        ];
    }
    public function update($id)
    {
        $bill = $this->billRepository->show($id);
        if($bill->status == 1){
            return new BaseResource($this->billRepository->update($id));
        }else{
            $billDetail = $this->billRepository->showBillDetail($id);
            foreach($billDetail as $row){
                $psc = $this->billRepository->updateBillDetail($row);
            }
            //Update amount product
            $product = [];
            foreach($billDetail as $row){
                array_push($product, $row->product_id);
            }
            foreach($product as $product_id){
                $totalAmount = $this->productRepository->sum($product_id);
                $this->productRepository->amount($product_id, $totalAmount);
            }
            return new BaseResource($this->billRepository->updateStatus($id));
        } 
    }
    public function destroy($id, Request $request)
    {
        $bill = $this->billRepository->show($id);
        $destroy = new BaseResource($this->billRepository->destroy($id, $request->session()->put('bill', $bill->customer_id)));
        $request->session()->forget('bill');
        return $destroy;
    }
    public function statistical()
    {
        return response()->json($this->billRepository->statistical(), 200);
    }
}