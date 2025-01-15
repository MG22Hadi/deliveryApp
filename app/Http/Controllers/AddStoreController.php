<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class AddStoreController extends Controller
{
    // عرض صفحة إضافة متجر
    public function show()
    {
        return view('add-store');
    }

    // معالجة إضافة متجر
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        // حفظ صورة اللوجو في المسار المخصص داخل public
        $logo = $request->file('logo');
        $logoName = time() . '_' . $logo->getClientOriginalName(); // إنشاء اسم فريد للصورة
        $logoPath = 'webImages/Stores/' . $logoName; // المسار النسبي داخل public
        $logo->move(public_path('webImages/Stores'), $logoName); // نقل الصورة إلى public

        // إنشاء المتجر
        Store::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $logoPath, // حفظ مسار اللوجو
            'description' => $request->description,
        ]);

        // إرسال رسالة نجاح
        session()->flash('success', 'تمت إضافة المتجر بنجاح!');

        // البقاء في نفس الصفحة
        return redirect()->back();
    }
}
