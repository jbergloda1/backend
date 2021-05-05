<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\product\ProductCollection;
use App\Repositories\ProductRepository;
use App\Http\Resources\product\ProductResource;
use App\Http\Resources\BaseResource;
use App\Http\Resources\BaseCollection;
use App\Http\Resources\product\ProductSizeColorResource;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductSizeColorRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Resources\product\SizeCollection;
use App\Http\Resources\product\ColorCollection;

use App\Models\SessionUser;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function search(ProductRequest $request)
    {
        return new ProductCollection($this->productRepository->search($request->searchFilter()));
    }

    public function show($id)
    {
        return new ProductResource($this->productRepository->show($id));
    }

    public function store(ProductRequest $request, ProductSizeColorRequest $requestSizeColor)
    {
        //Product
        if($request->hasFile('img')){
            $image          = $request->file('img');
            $newNamefile    = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/product'),$newNamefile);
            $product        = new BaseResource($this->productRepository->store($request->storeFilter(), $newNamefile));
            $product_id     = $product->id;
            
            if($product == true){ 
                //Product-Size-Color
                if(isset($requestSizeColor->size_id) && isset($requestSizeColor->color_id) && isset($requestSizeColor->amount)){
                    $size = $requestSizeColor->size_id;
                    $color = $requestSizeColor->color_id; 
                    $amount = $requestSizeColor->amount;
                    for($x = 0; $x < count($amount); $x++) {
                        $data = array('size_id'=>$size[$x], 'color_id'=> $color[$x], 'amount'=>$amount[$x]);
                        $PSC = new BaseResource($this->productRepository->storePSC($data, $product_id));
                    }
                    //Amount Product
                    if($PSC == true){
                        $totalAmount = $this->productRepository->sum($product_id);
                        $this->productRepository->amount($product_id, $totalAmount);
                    }
                }
            }
            return $product;
        }
    }

    public function update(ProductRequest $request, ProductSizeColorRequest $requestSizeColor, $id)
    {
        $Updateproduct = new BaseResource($this->productRepository->update($request->updateFilter(), $id));
            if(isset($requestSizeColor->size_id) && isset($requestSizeColor->color_id) && isset($requestSizeColor->amount)){
                $productPSC = $this->productRepository->showPSC($id);
                $idPSC = [];
                foreach($productPSC as $row){
                    array_push($idPSC, $row['id']);
                }
                $size = $requestSizeColor->size_id;
                $color = $requestSizeColor->color_id;
                $amount = $requestSizeColor->amount;
                for($x = 0; $x < count($amount); $x++) {
                    $data = array('id'=>$idPSC[$x], 'size_id'=>$size[$x], 'color_id'=> $color[$x], 'amount'=>$amount[$x]);
                    $PSC = new BaseResource($this->productRepository->updatePSC($data));
                }


                
                $totalAmount = $this->productRepository->sum($id);
                $this->productRepository->amount($id, $totalAmount);
            }
        return $Updateproduct;
    }
    
    public function destroy($id)
    {
        $getdata = new ProductResource($this->productRepository->show($id));
        if($getdata->status == 1){
            return new BaseResource($this->productRepository->destroy($id));
        }else{
            return new BaseResource($this->productRepository->updateStatus($id));
        }
    }

    public function category($id)
    {
        return new ProductCollection($this->productRepository->category($id));
    }

    public function getSize()
    {
        return new SizeCollection($this->productRepository->getSize());
    }
    public function getColor()
    {
        return new ColorCollection($this->productRepository->getColor());
    }
}
 