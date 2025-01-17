<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\OrderController;
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

Route::get('products/ad', [ProductController::class, 'Ads']);

Route::get('products/mostSell', [ProductController::class, 'mostSell']);

Route::get('products/mostfamous', [StoreController::class, 'mostfamous']);

Route::post('users/upload-image', [ProfileController::class,'uploadImage']);

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

Route::post('favourites/{productId}', [FavouriteController::class, 'addTofav']);
Route::delete('favourites/del', [FavouriteController::class, 'destroyFav']);
Route::get('favourites/show', [FavouriteController::class, 'showFav']);
Route::get('favourites/check', [FavouriteController::class, 'checkFav']);

Route::post('/register',[\App\Http\Controllers\api\user\AuthController::class, 'register']);
Route::post('/login',[\App\Http\Controllers\api\user\AuthController::class, 'login']);
Route::post('/logout',[\App\Http\Controllers\api\user\AuthController::class, 'logout']) ;

Route::get('/getUser', [\App\Http\Controllers\api\user\AuthController::class, 'getUser']);
Route::post('/refresh', [\App\Http\Controllers\api\user\AuthController::class, 'refresh']);

Route::put('/updateUser', [\App\Http\Controllers\api\user\AuthController::class, 'updateUser']);

Route::put('/change-password', [\App\Http\Controllers\api\user\AuthController::class, 'changePassword']);
// cart
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart']);

Route::get('/cart', [CartController::class, 'viewCart']);

//Route::put('/cart/update', [CartController::class, 'updateCart']);
Route::post('/cart/increase/{cartItemId}', [CartController::class, 'increaseCartItem']);

Route::post('/cart/decrease/{cartItemId}', [CartController::class, 'decreaseCartItem']);

Route::delete('/cart/remove/{cartId}', [CartController::class, 'removeFromCart']);

Route::get('/cart/totalPrice', [CartController::class, 'calculateTotalPrice']);

Route::post('/order/checkout', [OrderController::class, 'checkout']);

Route::get('/orders', [OrderController::class, 'getOrders']);
// إعادة الطلب إلى واجهة السلة للتعديل
Route::get('/orders/{orderId}/edit', [OrderController::class, 'editOrder']);
// حفظ التعديلات على الطلب
Route::put('/orders/{orderId}', [OrderController::class, 'updateOrder']);
Route::put('/orders/{orderId}/status', [OrderController::class, 'changeOrderStatus']);
Route::post('/orders/{orderId}/cancel', [OrderController::class, 'cancelOrder']);

Route::get('/orders/pp', [OrderController::class, 'getPendingOrders']);

Route::prefix('driver')->group(function () {
    Route::post('/register', [DriverController::class, 'register']);
    Route::post('/login', [DriverController::class, 'login']);
    Route::middleware('auth:api')->get('/me', [DriverController::class, 'getDriverData']);
});

Route::prefix('driver')->group(function () {
    Route::post('/register', [DriverController::class, 'register']);
    Route::post('/login', [DriverController::class, 'login']);
    Route::middleware('auth:driver-api')->get('/me', [DriverController::class, 'getDriver']);
    Route::middleware('auth:driver-api')->post('/update', [DriverController::class, 'updateDriver']);
    Route::middleware('auth:driver-api')->post('/change-password', [DriverController::class, 'changePassword']);
    Route::middleware('auth:driver-api')->post('/logout', [DriverController::class, 'logout']);
});

Route::post('/orders/assign-driver', [DriverController::class, 'assignDriver']);

Route::get('/order/get/inProgress', [DriverController::class, 'getInProgressOrders'])->middleware('auth:driver-api');
