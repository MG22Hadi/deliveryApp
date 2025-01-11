<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class OrderController extends Controller
{
     use GeneralTrait; // استخدام الـ Trait

    public function checkout()
{
    try {
        // التحقق من صحة الـ Token والحصول على المستخدم
        $user = JWTAuth::parseToken()->authenticate();

        // إذا لم يتم العثور على المستخدم
        if (!$user) {
            return $this->returnError('E401', 'Unauthorized');
        }

        // استرجاع عناصر السلة الخاصة بالمستخدم
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        // إذا كانت السلة فارغة
        if ($cartItems->isEmpty()) {
            return $this->returnError('E404', 'The cart is empty');
        }

        // تحضير مصفوفة items
        $items = [];
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $items[] = [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ];

            // حساب السعر الإجمالي
            $totalAmount += $item->quantity * $item->product->price;
        }

        // إنشاء الطلب
        $order = Order::create([
            'user_id' => $user->id,
            'items' => json_encode($items), // تخزين items كمصفوفة JSON
            'total_amount' => $totalAmount,
            'status' => 'pending', // الحالة الافتراضية للطلب
        ]);

        // تفريغ السلة بعد إنشاء الطلب
        Cart::where('user_id', $user->id)->delete();

        // إرجاع تفاصيل الطلب
        return $this->returnData('order', $order, 'Order created successfully');
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}
}
