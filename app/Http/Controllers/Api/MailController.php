<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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



class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $billRepositoty;
    private $customerRepository;
    private $productRepository;
    public function index()
    {
        //
    }
    public function __construct(BillRepository $billRepositoty, CustomerRepository $customerRepository, ProductRepository $productRepository)
    {
        $this->billRepositoty = $billRepositoty;
        $this->customerRepository = $customerRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail($id)
    {
        $bill = new BillResource($this->billRepository->showBill($id));
        dd($bill);
        // $getBill = $this->billRepositoty->show($id);
        // dd($getBill);
        // $detail = 
        // Mail::to("jbergloda1@gmail.com")->send(new TestMail($detail));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
