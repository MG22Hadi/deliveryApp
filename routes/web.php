<?php

use App\Http\Controllers\HomeController;
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

Route::get('/drivers', function () {
    return view('drivers');
})->name('drivers');

Route::get('/add-product', function () {
    return view('add-product');
})->name('add-product');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
