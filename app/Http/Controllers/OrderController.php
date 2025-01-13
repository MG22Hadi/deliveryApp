<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
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

        // استرجاع عناصر السلة الخاصة بالمستخدم مع تفاصيل المنتجات
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        // إذا كانت السلة فارغة
        if ($cartItems->isEmpty()) {
            return $this->returnError('E404', 'The cart is empty');
        }

        // تحضير مصفوفة items
        $items = [];
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            // التحقق من أن الكمية المطلوبة متاحة في المخزون
            if ($item->product->quantity < $item->quantity) {
                return $this->returnError('E400', 'Not enough stock for product: ' . $item->product->name);
            }

            $items[] = [
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ];

            // حساب السعر الإجمالي
            $totalAmount += $item->quantity * $item->product->price;

            // تقليل كمية المنتج في المخزون
            $item->product->quantity -= $item->quantity;
            $item->product->save();
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


    public function getOrders()
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            // إذا لم يتم العثور على المستخدم
            if (!$user) {
                return $this->returnError('E401', 'Unauthorized');
            }

            // استرجاع جميع الطلبات الخاصة بالمستخدم
            $orders = Order::where('user_id', $user->id)->get();

            // إذا لم يكن هناك طلبات
            if ($orders->isEmpty()) {
                return $this->returnError('E404', 'No orders found');
            }

            // إرجاع تفاصيل الطلبات
            return $this->returnData('orders', $orders, 'Orders retrieved successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function editOrder($orderId)
{
    try {
        // التحقق من صحة الـ Token والحصول على المستخدم
        $user = JWTAuth::parseToken()->authenticate();

        // إذا لم يتم العثور على المستخدم
        if (!$user) {
            return $this->returnError('E401', 'Unauthorized');
        }

        // استرجاع الطلب
        $order = Order::where('id', $orderId)->where('user_id', $user->id)->first();

        // إذا لم يتم العثور على الطلب
        if (!$order) {
            return $this->returnError('E404', 'Order not found');
        }

        // التحقق من حالة الطلب
        if ($order->status != 'pending') {
            return $this->returnError('E403', 'Order cannot be edited');
        }

        // إرجاع تفاصيل الطلب إلى واجهة السلة
        return $this->returnData('order', $order, 'Order retrieved successfully');
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}

public function updateOrder(Request $request, $orderId)
{
    try {
        // التحقق من صحة الـ Token والحصول على المستخدم
        $user = JWTAuth::parseToken()->authenticate();

        // إذا لم يتم العثور على المستخدم
        if (!$user) {
            return $this->returnError('E401', 'Unauthorized');
        }

        // استرجاع الطلب
        $order = Order::where('id', $orderId)->where('user_id', $user->id)->first();

        // إذا لم يتم العثور على الطلب
        if (!$order) {
            return $this->returnError('E404', 'Order not found');
        }

        // التحقق من حالة الطلب
        if ($order->status != 'pending') {
            return $this->returnError('E403', 'Order cannot be edited');
        }

        // فك تشفير العناصر الحالية في الطلب
        $currentItems = json_decode($order->items, true);

        // العناصر الجديدة المرسلة في الطلب
        $newItems = $request->items;

        // تحديث كمية المنتجات في المخزون بناءً على التغييرات
        foreach ($newItems as $newItem) {
            // البحث عن العنصر الحالي في الطلب
            $currentItem = collect($currentItems)->firstWhere('product_id', $newItem['product_id']);

            if ($currentItem) {
                // حساب الفرق بين الكمية الجديدة والكمية الحالية
                $quantityDifference = $newItem['quantity'] - $currentItem['quantity'];

                // البحث عن المنتج في قاعدة البيانات
                $product = Product::find($newItem['product_id']);

                if ($product) {
                    // إذا كانت الكمية الجديدة أكبر من الكمية الحالية
                    if ($quantityDifference > 0) {
                        // التحقق من أن الكمية الإضافية متاحة في المخزون
                        if ($product->quantity < $quantityDifference) {
                            return $this->returnError('E400', 'Not enough stock for product: ' . $product->name);
                        }

                        // خصم الكمية الإضافية من المخزون
                        $product->quantity -= $quantityDifference;
                    } else {
                        // إضافة الكمية المخصومة إلى المخزون
                        $product->quantity += abs($quantityDifference);
                    }

                    // حفظ التغييرات في المنتج
                    $product->save();
                }
            }
        }

        // تحديث تفاصيل الطلب
        $order->items = json_encode($newItems); // تحديث العناصر
        $order->total_amount = array_reduce($newItems, function ($total, $item) {
            return $total + ($item['quantity'] * $item['price']);
        }, 0); // تحديث السعر الإجمالي تلقائيًا
        $order->save();

        // إرجاع تفاصيل الطلب المعدل
        return $this->returnData('order', $order, 'Order updated successfully');
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}

    public function cancelOrder($orderId)
{
    try {
        // التحقق من صحة الـ Token والحصول على المستخدم
        $user = JWTAuth::parseToken()->authenticate();

        // إذا لم يتم العثور على المستخدم
        if (!$user) {
            return $this->returnError('E401', 'Unauthorized');
        }

        // استرجاع الطلب
        $order = Order::where('id', $orderId)->where('user_id', $user->id)->first();

        // إذا لم يتم العثور على الطلب
        if (!$order) {
            return $this->returnError('E404', 'Order not found');
        }

        // التحقق من حالة الطلب
        if ($order->status != 'pending') {
            return $this->returnError('E403', 'Order cannot be canceled');
        }

        // فك تشفير العناصر في الطلب
        $items = json_decode($order->items, true);

        // إعادة كمية المنتجات إلى المخزون
        foreach ($items as $item) {
            $product = Product::find($item['product_id']);

            if ($product) {
                $product->quantity += $item['quantity']; // إضافة الكمية إلى المخزون
                $product->save();
            }
        }

        // تغيير حالة الطلب إلى "ملغى"
        $order->status = 'canceled';
        $order->save();

        // إرجاع رسالة نجاح
        return $this->returnSuccessMessage('Order canceled successfully');
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}

    public function changeOrderStatus(Request $request, $orderId)
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            // إذا لم يتم العثور على المستخدم
            if (!$user) {
                return $this->returnError('E401', 'Unauthorized');
            }

            // استرجاع الطلب
            $order = Order::where('id', $orderId)->where('user_id', $user->id)->first();

            // إذا لم يتم العثور على الطلب
            if (!$order) {
                return $this->returnError('E404', 'Order not found');
            }

            // التحقق من الحالة الجديدة المطلوبة
            $newStatus = $request->status;

            // قائمة الحالات المسموح بها
            $allowedStatuses = ['pending', 'in_progress', 'delivered'];

            if (!in_array($newStatus, $allowedStatuses)) {
                return $this->returnError('E400', 'Invalid status');
            }

            // تغيير حالة الطلب
            $order->status = $newStatus;
            $order->save();

            // إرجاع تفاصيل الطلب بعد التحديث
            return $this->returnData('order', $order, 'Order status updated successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

}
