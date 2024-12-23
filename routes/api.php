<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

//تسجيل حساب لأول مرة       //
Route::post('/register', [AuthController::class, 'register']);

Route::post('/users/{user}/upload-image', [ProfileController::class,'uploadImage']);

Route::get('/users/{user}/showProfile', [ProfileController::class,'showProfile']);

//إرجاع كل المتاجر     //
Route::get('stores', [StoreController::class, 'get_all_stores']);

// إرجاع متجر محدد عن طريق id تبعه     //
Route::get('one-store/{storeId}', [StoreController::class, 'get_one_store']);

   // إرجاع جميع أقسام متجر عن طريق id المتجر     //
Route::get('stores/{storeId}/cats', [CategoryController::class, 'showCats']);

// إرجاع جميع منتجات قسم ما عن طريق id القسم      //
Route::get('categories/{categoryId}/products', [ProductController::class, 'productsByCategory']);

// إرجاع منتج محدد عن طريق id تبع المنتج نفسو      //
Route::get('one-product/{productId}', [ProductController::class, 'get_one_product']);

//  إرجاع جميع المنتجات لصفحة المنتجات     //
Route::get('products-all-PP', [ProductController::class, 'get_all_products']);

// بحث عن منتج عن طريق اسمه     //
Route::get('/products/search/{productName}', [ProductController::class, 'search']);
// بحث عن متجر عن طريق اسمه     //
Route::get('/stores/search/{storeName}', [StoreController::class, 'search']);

Route::put('cart/{productId}/{i}', [CartController::class,'addToCart']);
Route::get('cart/{i}', [CartController::class,'showCart']);
Route::post('/products/{product}/favourite', [FavouriteController::class, 'store']);
//Route::post('/products/{product_id}/favourite', [FavouriteController::class, 'store']);
Route::delete('/products/{product}/favorite', [FavouriteController::class, 'destroy']);
