<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function store(Product $product)
    {
        //$user = Auth::user();
        $user=User::find(1);
        if ($user->favorites()->where('product_id', $product->id /*$product_id*/)->exists()) {
            return response()->json(['message' => 'المنتج موجود بالفعل في المفضلة'], 409);
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

//public function store($product_id)
//{
//    $user = User::find(1);
//    if ($user->favorites()->where('product_id', $product_id)->exists()) {
//        return response()->json(['message' => 'المنتج موجود بالفعل في المفضلة'], 409); // Conflict
//    }
//
//    Favourite::create([
//        'user_id' => $user->id(),
//        'product_id' => $product_id,
//    ]);
//
//    return response()->json(['message' => 'تمت إضافة المنتج إلى المفضلة بنجاح'], 201);
//}
