<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'storeName' => 'required|string|max:255',
            'description' => 'required|string',
            'categoryName' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            //'Ad-image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // البحث عن المتجر باستخدام الاسم
        $store = Store::where('name', $request->storeName)->first();
        if (!$store) {
            return redirect()->back()->withErrors(['storeName' => 'Store not found!'])->withInput();
        }

        // البحث عن القسم باستخدام الاسم
        $category = Category::where('name', $request->categoryName)->where('store_id', $store->id)->first();

        // إذا لم يتم العثور على القسم، نقوم بإنشائه
        if (!$category) {
            $category = new Category();
            $category->name = $request->categoryName;
            $category->store_id = $store->id;
            $category->save();
        }

        // حفظ صورة المنتج في المسار المخصص
        // حفظ صورة المنتج في المسار المخصص داخل public
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName(); // إنشاء اسم فريد للصورة
        $imagePath = 'webImages/New products/' . $imageName; // المسار النسبي داخل public
        $image->move(public_path('webImages/New products'), $imageName); // نقل الصورة إلى public/*


        // حفظ صورة الإعلان إذا كانت موجودة
        $adImagePath = '//';
        if ($request->hasFile('AdImage')) {
            $adImagePath = $request->file('AdImage')->store('webImages/New products', 'public');
        }




        // إنشاء المنتج باستخدام Product::create()
        Product::create([
            'category_id' => $category->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // حفظ مسار الصورة
            'AdImage' => $adImagePath, // حفظ مسار صورة الإعلان أو قيمة افتراضية
            'categoryName' => $category->name, // إضافة اسم القسم
            'storeName' => $store->name, // إضافة اسم المتجر
            'quantity' => $request->quantity,

            //'store_id' => $store->id,
        ]);



        // إرسال رسالة نجاح
        session()->flash('success', 'تمت إضافة المنتج بنجاح!');

        // البقاء في نفس الصفحة
        return redirect()->back();
    }
}
