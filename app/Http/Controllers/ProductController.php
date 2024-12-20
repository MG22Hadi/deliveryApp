<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productsByCategory($categoryId)
    {
        $category = Category::with('products')->find($categoryId);

        if (!$category) {
            return response()->json(['message' => 'القسم غير موجود'], 404);
        }

        //return $category->products;
        return response()->json($category->products);
        /*DB::table('stores')->truncate();*/
    }

    public function get_one_product($productId)
    {
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'لا يوجد هكذا منتج لدينا'], 404);
        }
        $id=$product->category_id;
        $cat_name=Category::find($id);
        return response()->json([$product,$cat_name]);

        //TODO
        /* للنقاش هل يلزمني ايدي القسم أم لا
        // وضع الابي المناسب في حال اعتمدنا هيك
       public function showProduct($catId, $productId)
       {
           $cat = Category::findOrFail($catId);
           $product = $category->products->find($productId);

       }
        */
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
