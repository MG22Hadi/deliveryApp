<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Product;
use App\Models\User;
use App\Services\AuthService;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    use GeneralTrait;
    protected $authService;

    /**
     * Constructor to inject AuthService.
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function addTofav($product_id)
    {


        // الحصول على المستخدم الحالي من التوكن
        $user = $this->authService->getUser();

        // اتأكد إذا موجود بالسلة مسبقاً مافي داعي بس كترة غلبة
        $existingFavourite = Favourite::where('user_id', $user->id)
            ->where('product_id', $product_id)
            ->first();

        if ($existingFavourite) {
            return response()->json(['message' => 'Product already in favourites'], 400);
        }

        // إضافة عجدول المفضلة
        $favourite = Favourite::create([
            'user_id' => $user->id,
            'product_id' => $product_id,
        ]);

        return response()->json(['message' => 'Product added to favourites', 'data' => $favourite], 201);
    }

    public function destroyFav(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        // الحصول على المستخدم الحالي من التوكن
        $user = $this->authService->getUser();

        // البحث عنو إذا موجود بالمفضلة بناءً على user_id و product_id
        $favourite = Favourite::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if (!$favourite) {
            return response()->json(['message' => 'Favourite not found'], 404);
        }

        // حذف من جدول المفضلة
        $favourite->delete();

        return response()->json(['message' => 'Product removed from favourites'], 200);
    }
    public function showFav()
{
    // الحصول على المستخدم الحالي من التوكن
    $user = $this->authService->getUser();

    // جلب المنتجات المفضلة مع تفاصيل المنتج
    $favourites = Favourite::with('product')
        ->where('user_id', $user->id)
        ->get();

    // التحقق من وجود منتجات مفضلة
    if ($favourites->isEmpty()) {
        return $this->returnError('E100', 'No favourite products found.');
    } else {
        return $this->returnData('favourites', $favourites, 'Favourite products retrieved successfully.');
    }
}

    public function checkFav(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = $this->authService->getUser();

        $isFavourite = Favourite::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->exists();

        return response()->json(['is_favourite' => $isFavourite], 200);
    }
}

