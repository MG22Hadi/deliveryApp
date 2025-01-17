<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class DashController extends Controller
{

    use GeneralTrait;
  public function getPendingOrders()
{
    try {
        // استرجاع الطلبات المعلقة مع تحميل بيانات المستخدم
        $pendingOrders = Order::where('status', 'pending')
                              ->with('user') // تحميل بيانات المستخدم مع كل طلب
                              ->get();

        // إذا لم يكن هناك طلبات معلقة
        if ($pendingOrders->isEmpty()) {
            return view('orders')->with('error', 'No pending orders found');
        }

        // إرجاع تفاصيل الطلبات المعلقة إلى العرض
        return view('orders', ['pendingOrders' => $pendingOrders]);
    } catch (\Exception $ex) {
        return view('orders')->with('error', $ex->getMessage());
    }
}

public function showUser()
{
     $pendingOrders = Order::where('status', 'pending')->get();
     return view('orders', ['pendingOrders' => $pendingOrders]);
}
}
