<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Order;
use App\Services\DriverAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Facades\JWTAuth;

class DriverController extends Controller
{
     use GeneralTrait;

    protected $driverAuthService;

    public function __construct(DriverAuthService $driverAuthService)
    {
        $this->driverAuthService = $driverAuthService;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'phone' => 'required|string|max:10|min:10|unique:drivers',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ]);

        if ($validator->fails()) {
            return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
        }

        try {
            $token = $this->driverAuthService->register($request->all());
            return $this->returnData('token', $token);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            $rules = [
                "phone" => "required",
                "password" => "required",
                "remember_me" => "boolean"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
            }

            $credentials = $request->only(['phone', 'password']);
            $token = $this->driverAuthService->login($credentials);
            return $this->returnData('token', $token);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->driverAuthService->logout();
            return $this->returnSuccessMessage('تم تسجيل الخروج بنجاح');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function getDriver()
    {
        try {
            $driver = $this->driverAuthService->getDriver();
            return $this->returnData('driver', $driver);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function updateDriver(Request $request)
    {
        try {
            $driver = $this->driverAuthService->updateDriver($request->all());
            return $this->returnData('driver', $driver, 'تم تحديث المعلومات بنجاح');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $newToken = $this->driverAuthService->changePassword($request->all());
            return $this->returnData('token', $newToken, 'تم تغيير كلمة المرور بنجاح');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function index()
{
    $pendingOrders = Order::where('status', 'pending')->with('user')->get();
    $drivers = Driver::all();

    return view('orders', compact('pendingOrders', 'drivers'));
}
    public function getInProgressOrders()
    {
        try {
            // استرجاع الطلبات البروغرس
            $inProgressOrders = Order::where('status', 'in_progress') // شرط للطلبات البروغرس
            ->get();

            // إذا لم يكن هناك طلبات معلقة
            if ($inProgressOrders->isEmpty()) {
                return $this->returnError('E404', 'No in_progress orders found');
            }


//            // تحويل items من JSON إلى مصفوفة PHP
//            $itemsArray = json_decode($inProgressOrders->items, true);
//
//            // إعادة تعيين المصفوفة المشفرة إلى الـ order
//            $inProgressOrders->items = $itemsArray;
//
//            // إرجاع تفاصيل الطلبات المعلقة
//            return $this->returnData('in_progress_orders', $inProgressOrders, 'In_progress orders retrieved successfully');
//        } catch (\Exception $ex) {
//            return $this->returnError($ex->getCode(), $ex->getMessage());

            // تكرار على كل طلب وفك تشفير items
            $inProgressOrders->each(function ($order) {
                $order->items = json_decode($order->items, true);
            });

            // إرجاع تفاصيل الطلبات لبروغرس
            return $this->returnData('in_progress_orders', $inProgressOrders, 'In_progress orders retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function assignDriver(Request $request)
{
    $request->validate([
        'driver_id' => 'required|exists:drivers,id',
        'order_id' => 'required|exists:orders,id',
    ]);

    // البحث عن الطلب وتحديث driver_id
    $order = Order::find($request->order_id);

    if (!$order) {
        return response()->json(['message' => 'الطلب غير موجود'], 404);
    }

    $order->driver_id = $request->driver_id;
    $order->status ="in_progress";
    $order->save();

    return response()->json(['message' => 'تم تعيين السائق بنجاح']);
}


}
