<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::middleware('auth:sanctum')->group(function () {
//    Route::apiResource('products', \App\Http\Controllers\ProductController::class);
//    Route::apiResource('discounts', \App\Http\Controllers\DiscountCodeController::class)->only(['store','update']);
//    Route::post('carts', [\App\Http\Controllers\CartController::class, 'store']);
//    Route::post('carts/{cart}/checkout', [\App\Http\Controllers\CartController::class, 'checkout']);
//    Route::post('products/{product}/stock', [\App\Http\Controllers\InventoryLogController::class, 'updateStock']);
//});
Route::post('users/register', [\App\Http\Controllers\UserController::class, 'register']);

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::delete('products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);
});

Route::post('/product', [\App\Http\Controllers\ProductController::class,'store']);
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class,'update']);
//Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);
Route::put('/discounts/{id}', [\App\Http\Controllers\DiscountCodeController::class,'update']);
Route::post('discounts', [\App\Http\Controllers\DiscountCodeController::class,'store']);
Route::post('/carts', [\App\Http\Controllers\CartController::class, 'store']);
Route::post('/carts/checkout/{id}', [\App\Http\Controllers\CartController::class, 'checkout']);
Route::post('/products/stock/{id}', [\App\Http\Controllers\InventoryLogController::class, 'updateStock']);
