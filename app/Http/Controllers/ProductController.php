<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // دالة إرجاع جميع منتجات قسم عن طريق id القسم
    public function productsByCategory($categoryId)
    {
        // نبحث عن القسم مع منتجاتو ونخزنو
        $category = Category::with('products')->find($categoryId);

        // إذا ما لقينا القسم
        if (!$category) {
            return response()->json(['message' => 'القسم غير موجود'], 404);
        }
        // نرجع المنتجات
        return response()->json($category->products);
    }

    // دالة إرجاع منتج محدد عن طريق id الخاصة به
    public function get_one_product($productId)
    {
        // لاقي المنتج
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'لا يوجد هكذا منتج لدينا'], 404);
        }
        // مشان جيب اسم القسم
        //$id=$product->category_id;
        //$cat_name=Category::find($id);
        // رجع المنتج واسم القسم اللي تابعلو
        return response()->json([$product]);
    }

    //دالة جيب كل المنتجات مشان صفحة المنتجات
    public function get_all_products()
    {
        $products=Product::all();
        return response()->json($products);
    }
    // دالة بحث عن منتج عن طريق اسمو
    public function search($productname)
    {
        // نلاقي منتج متل هالاسم
        $products = Product::where('name', 'like', "%$productname%")->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'عفواً ليس لدينا منتجات كهذه'], 404);
        }

        return response()->json($products);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //62525
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
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products)
    {
        //
    }
}
