<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CartController extends Controller
{
    use GeneralTrait;

    // إضافة منتج إلى السلة
    public function addToCart(Request $request, $productId)
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            // إذا لم يتم العثور على المستخدم
            if (!$user) {
                return $this->returnError('E401', 'Unauthorized');
            }

            // البحث عن المنتج
            $product = Product::find($productId);

            // إذا لم يتم العثور على المنتج
            if (!$product) {
                return $this->returnError('E404', 'Product not found');
            }

            // إضافة المنتج إلى السلة مع توفير قيمة لحقل `price`
            $cart = Cart::firstOrCreate([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ], [
                'quantity' => 1,
                'price' => $product->price, // إضافة سعر المنتج
            ]);

            if (!$cart->wasRecentlyCreated) {
                $cart->increment('quantity');
            }

            return $this->returnSuccessMessage('Product added to cart successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function viewCart()
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            $cartItems = Cart::where('user_id', $user->id)
                ->with(['product' => function ($query) {
                    $query->select('id', 'name', 'price', 'image'); // تحديد الحقول المطلوبة من جدول المنتجات
                }])
                ->select('id', 'user_id', 'product_id', 'quantity', 'price') // تحديد الحقول المطلوبة من جدول السلة
                ->get();

            if ($cartItems->isEmpty()) {
                return $this->returnError('E001', 'The cart is empty');
            }

            return $this->returnData('cart', $cartItems);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function updateCart(Request $request)
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            // إذا لم يتم العثور على المستخدم
            if (!$user) {
                return $this->returnError('E401', 'Unauthorized');
            }

            // التحقق من صحة البيانات المرسلة
            $validator = Validator::make($request->all(), [
                'items' => 'required|array', // يجب أن تكون البيانات عبارة عن مصفوفة
                'items.*.cart_id' => 'required|integer|exists:carts,id', // كل عنصر يجب أن يحتوي على cart_id صحيح
                'items.*.quantity' => 'required|integer|min:1', // الكمية يجب أن تكون عددًا صحيحًا أكبر من أو يساوي 1
            ]);

            // إذا فشل التحقق من الصحة
            if ($validator->fails()) {
                return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
            }

            $updatedItems = []; // لتخزين العناصر التي تم تحديثها
            $errors = []; // لتخزين الأخطاء

            // تحديث جميع العناصر في السلة
            foreach ($request->items as $item) {
                // البحث عن العنصر في السلة
                $cartItem = Cart::where('id', $item['cart_id'])
                    ->where('user_id', $user->id) // التأكد من أن العنصر ينتمي إلى المستخدم الحالي
                    ->with('product') // تحميل بيانات المنتج المرتبط
                    ->first();

                // إذا تم العثور على العنصر
                if ($cartItem) {
                    // التحقق من أن الكمية المطلوبة لا تتجاوز الكمية المتاحة
                    if ($item['quantity'] <= $cartItem->product->quantity) {
                        $cartItem->update([
                            'quantity' => $item['quantity'],
                        ]);
                        $updatedItems[] = $cartItem->id; // إضافة معرف العنصرالذي تم تحديثه
                    } else {
                        // إضافة خطأ للعنصر الذي تتجاوز كمية الطلب فيه الكمية المتاحة
                        $errors[] = [
                            'cart_id' => $item['cart_id'],
                            'product_name' => $cartItem->product->name,
                            'message' => 'The requested quantity (' . $item['quantity'] . ') exceeds the available stock (' . $cartItem->product->quantity . ') for product ' . $cartItem->product->name,
                        ];
                    }
                }
            }

            // إذا لم يتم تحديث أي عنصر
            if (empty($updatedItems) && !empty($errors)) {
                return $this->returnErrorWithData('E400', 'No items were updated due to insufficient stock', $errors);
            }

            // إذا تم تحديث بعض العناصر ولكن كانت هناك أخطاء
            if (!empty($errors)) {
                return $this->returnDataSp('updated_items', $updatedItems, 'Some items were updated, but there were errors', $errors);
            }

            // إذا تم تحديث جميع العناصر بنجاح
            return $this->returnData('updated_items', $updatedItems, 'Cart updated successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function removeFromCart($cartId)
    {
        try {
            // التحقق من صحة الـ Token والحصول على المستخدم
            $user = JWTAuth::parseToken()->authenticate();

            // إذا لم يتم العثور على المستخدم
            if (!$user) {
                return $this->returnError('E401', 'Unauthorized');
            }

            // البحث عن العنصر في السلة
            $cartItem = Cart::where('id', $cartId)
                ->where('user_id', $user->id) // التأكد من أن العنصر ينتمي إلى المستخدم الحالي
                ->first();

            // إذا لم يتم العثور على العنصر
            if (!$cartItem) {
                return $this->returnError('E404', 'Cart item not found');
            }

            // حذف العنصر من السلة
            $cartItem->delete();

            // إرجاع رسالة نجاح
            return $this->returnSuccessMessage('Cart item removed successfully');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function calculateTotalPrice()
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

        // حساب السعر الإجمالي
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // إرجاع السعر الإجمالي
        return $this->returnData('total_price', $totalPrice, 'Total price calculated successfully');
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}



}
