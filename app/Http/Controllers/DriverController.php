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
        // Authenticate the token and get the driver using the correct guard
        $driver = Auth::guard('driver-api')->user();

        if (!$driver) {
            return $this->returnError('E001', 'Driver not found');
        }

        // Retrieve orders where driver_id matches the current driver's ID and status is 'in_progress'
        $orders = Order::where('driver_id', $driver->id)
            ->where('status', 'in_progress') // Add this condition to filter by status
            ->with(['user' => function ($query) {
                $query->select('id', 'first-name', 'last-name', 'phone'); // Select required fields from the users table
            }])
            ->select('id', 'user_id', 'driver_id', 'total_amount', 'status', 'created_at') // Select required fields from the orders table
            ->get();

        if ($orders->isEmpty()) {
            return $this->returnError('E002', 'No in-progress orders assigned to this driver');
        }

        return $this->returnData('orders', $orders);
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
