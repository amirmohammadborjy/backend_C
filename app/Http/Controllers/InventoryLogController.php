<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStockValidation;
use App\Http\Resources\InventoryLogResource;
use App\Models\InventoryLog;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryLogController extends Controller
{
    //
    public function updateStock(UpdateStockValidation $request, $id)
    {
        $product=Product::find($id);
        $oldStock = $product->stock;
        $product->update(['stock' => $request->stock]);

        $log = InventoryLog::create([
            'product_id' => $product->id,
            'user_id' => null,
            'old_stock' => $oldStock,
            'new_stock' => $request->stock,
            'changed_at' => now(),
        ]);

        return response()->json(['data'=>new InventoryLogResource($log)]) ;
    }
}
