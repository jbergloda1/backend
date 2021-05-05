<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\customer\CustomerCollection;
use App\Http\Resources\customer\CustomerResource;
use App\Http\Resources\BaseResource;
use App\Repositories\CustomerRepository;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }
    public function search(CustomerRequest $request)
    {
        return new CustomerCollection($this->customerRepository->search($request->searchFilter()));
    }
    public function show($id)
    {
        return new CustomerResource($this->customerRepository->show($id));
    }
    public function destroy($id)
    {
        return new BaseResource($this->customerRepository->destroy($id));
    }
}
