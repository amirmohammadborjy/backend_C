<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductValidation;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        return response()->json(['data'=>ProductResource::collection(Product::all())]);
    }

    public function store(StoreProductValidation $storeProductValidation)
    {

        try {
            $product = Product::create($storeProductValidation->except('images'));
            $image=Storage::putFile('/product', $storeProductValidation->images);
            $product->update(['images' => $image]);
            return response()->json(['data'=>new ProductResource($product)]) ;

        }catch (\Exception $exception){
            return response()->json(['data'=>false,'message'=>$exception->getMessage()],500);
        }

    }

    public function update(UpdateProductRequest $request, $id)
    {   $product=Product::find($id);
        if(!$product){
            return response()->json(['data'=>false,'message'=>'product not found'],404);
        }
        $product->update($request->validated());
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product=Product::find($id); // Soft Delete
        if(!$product){
            return response()->json(['data'=>false,'message'=>'Product not found'],404);
        }
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
