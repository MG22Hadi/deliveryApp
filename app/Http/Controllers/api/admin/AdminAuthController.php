<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Admin;


class AdminAuthController extends Controller
{
     use GeneralTrait;

    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:10|min:10|unique:admins',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $admin = Admin::create([
        'name'  => $request->name,
        'phone' => $request->phone,
        'password' => Hash::make($request->password),
    ]);

    // إنشاء Token باستخدام JWT
    $token = JWTAuth::fromUser($admin);

    // تخزين الـ Token في Cookie
    return redirect()->route('admin.home')->withCookie(cookie('jwt_token', $token, null));
}

    public function login(Request $request)
{
    $credentials = $request->only('phone', 'password');

    if (!$token = JWTAuth::attempt($credentials)) {
        return redirect()->back()->withErrors(['phone' => 'بيانات الدخول غير صحيحة'])->withInput();
    }

    // تخزين الـ Token في Cookie
    return redirect()->route('admin.home')->withCookie(cookie('jwt_token', $token, 60 * 24 * 7)); // صلاحية أسبوع
}

    public function logout()
{
    // حذف الـ Token من Cookie
    return redirect()->route('admin.login')->withCookie(cookie('jwt_token', null, -1));
}

    public function showLoginForm()
{
    return view('admin.login'); // عرض صفحة تسجيل الدخول
}

    public function showRegisterForm()
{
    return view('admin.register'); // عرض صفحة التسجيل
}
    public function getUser(Request $request)
{
    // استرجاع الـ Token من Cookie
    $token = $request->cookie('jwt_token');

    if (!$token) {
        return redirect()->route('admin.login');
    }

    // التحقق من الـ Token
    try {
        $admin = JWTAuth::setToken($token)->authenticate();
    } catch (\Exception $ex) {
        return redirect()->route('admin.login');
    }

    return view('admin.profile', compact('admin'));
}
}
