<?php

use App\Http\Controllers\api\admin\AdminAuthController;
use App\Http\Controllers\DashController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

//
//Route::get('/orders', function () {
//    return view('orders');
//})->name('orders');

Route::get('/drivers', function () {
    return view('drivers');
})->name('drivers');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

//Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// عرض صفحة التسجيل
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');

// معالجة بيانات التسجيل
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.submit');
// عرض صفحة تسجيل الدخول
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// معالجة بيانات تسجيل الدخول
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');

// تسجيل الخروج
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout')->middleware('jwt.auth');

// الحصول على بيانات المستخدم
Route::get('/admin/user', [AdminAuthController::class, 'getUser'])->name('admin.user')->middleware('jwt.auth');

Route::get('/orders', [DAshController::class, 'getPendingOrders'])->name('orders') ;
