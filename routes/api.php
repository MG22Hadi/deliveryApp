<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);


Route::get('stores', [StoreController::class, 'get_all_stores']);

Route::get('one-store/{storeId}', [StoreController::class, 'get_one_store']);

Route::get('stores/{storeId}/cats', [CategoryController::class, 'showCats']);

Route::get('categories/{categoryId}/products', [ProductController::class, 'productsByCategory']);

Route::get('one-product/{productId}', [ProductController::class, 'get_one_product']);


Route::put('cart/{productId}/{i}', [CartController::class,'addToCart']);

Route::get('cart/{i}', [CartController::class,'showCart']);
