<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //TODO new cart ?????
    public function addToCart($productId,$i)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'لا يوجد هكذا منتج لدينا'], 404);
        }

        // أتحقق إذا كان لدى المستخدم سلة
        $userCart = Cart::where('user_id', /*auth()->id())->first()*/ $i);

        if (!$userCart) {
            // إذا مانها موجودة، قم بإنشاء سلة جديدة للمستخدم
            $userCart = Cart::create(['user_id' => /*auth()->id()])*/ $i]);
        }

            // تحقق إذا كان المنتج موجود  في السلة
            $cartItem = Cart::where('user_id', /*auth()->id()*/ $i)
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                // إذا نوجد، قم بزيادة الكمية
                $cartItem->increment('quantity');
            } else {
                // إذا لم يوجد، قم بإنشاء سجل جديد
                Cart::create([
                    'user_id' => /*auth()->id()*/ $i,
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $product->price,
                ]);
            }

        return response()->json(['message' => 'تم إضافة المنتج إلى السلة بنجاح']);
    }

    //TODO
    public function showCart($i)
    {
        // الحصول على سلة المستخدم الحالي
        //$user = /*auth()->user()*/ $i;
        $cart = Cart::where('user_id', $i)->first();
        // إذا لم تكن هناك سلة، يمكنك عرض رسالة
        if (!$cart) {
            return response()->json(['message' => 'لا يوجد منتجات في السلة']);
        }

        // الحصول على المنتجات في السلة مع معلوماتها
        $cartItems = $cart->products()->with('product')->get();

        return response()->json($cartItems);
    }


    //TODO
    /*
    public function checkout()
{
    // احصل على جميع المنتجات في السلة
    $cartItems = CartItem::where('user_id', auth()->id())->get();

    // إنشاء طلب جديد
    $order = Order::create([
        // ... بيانات الطلب الأخرى
    ]);

    // انقل المنتجات من السلة إلى الطلب
    foreach ($cartItems as $cartItem) {
        $order->orderItems()->create([
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->price,
        ]);
    }

    // حذف المنتجات من السلة
    CartItem::where('user_id', auth()->id())->delete();

}
*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
