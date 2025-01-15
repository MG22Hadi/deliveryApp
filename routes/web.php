<?php

use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AddStoreController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('stores', [StoreController::class, 'get_all_stores']);
//
//Route::get('categories/{categoryId}/products', [ProductController::class, 'productsByCategory']);

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/orders', function () {
    return view('orders');
})->name('orders');

//Route::get('/drivers', function () {
//    return view('drivers');
//})->name('drivers');

Route::get('/drivers', [DriverController::class, 'index'])->name('drivers');


Route::get('/add-product', function () {
    return view('add-product');
})->name('add-product');

Route::post('/add-product', [AddProductController::class,'store'])->name('add-product.store');

// عرض صفحة إضافة متجر
Route::get('/add-store', [AddStoreController::class, 'show'])->name('add-store.show');

// معالجة إضافة متجر
Route::post('/add-store', [AddStoreController::class, 'store'])->name('add-store');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
