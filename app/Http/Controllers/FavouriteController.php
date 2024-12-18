<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $user = Auth::user();

        if ($user->favorites()->where('product_id', $product->id)->exists()) {
            return response()->json(['message' => 'المنتج موجود بالفعل في المفضلة'], 409); // Conflict
        }

        $user->favorites()->attach($product);

        return response()->json(['message' => 'تمت إضافة المنتج إلى المفضلة بنجاح'], 201);
    }

    public function destroy(Request $request, Product $product)
    {
        $user = Auth::user();

        $user->favorites()->detach($product);

        return response()->json(['message' => 'تم حذف المنتج من المفضلة بنجاح']);
    }
}
