<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscountValidation;
use App\Http\Requests\UpdateDiscountValidation;
use App\Http\Resources\DiscountResource;
use App\Models\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{
    //

    public function store(StoreDiscountValidation $storeDiscountValidation)
    {
        $discount = DiscountCode::create($storeDiscountValidation->validated());
        return response()->json(['data'=> new DiscountResource($discount)]);
    }

    public function update(UpdateDiscountValidation $updateDiscountValidation, $id)
    {
        $discount=DiscountCode::find($id);
        if(!$discount){
            return response()->json(['message'=>'Discount code not found'],404);
        }
        $discount->update($updateDiscountValidation->validated());
        return response()->json(['data'=> new DiscountResource($discount)]);
    }
}
