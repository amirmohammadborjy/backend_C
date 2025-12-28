<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartValidation;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function store(StoreCartValidation $request)
    {
        $cart = Cart::create([
            'user_id' => null,
            'items' => $request->items,
            'total_price' => $request->total_price,
            'status' => 'pending'
        ]);
        return new CartResource($cart);
    }

    public function checkout($id)
    {
        $cart=Cart::find($id);
        if(!$cart){
            return response()->json(['message' => 'Cart not found'], 404);
        }
        $cart->update(['status' => 'paid']);
        return new CartResource($cart);
    }
}
