<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
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

    public function uploadImage(Request $request)
    {
        $user = $this->authService->getUser();

        if (!$user) {
            return response()->json(['message' => 'المستخدم غير موجود'], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($user->profile_image && file_exists(public_path($user->profile_image))) {
                unlink(public_path($user->profile_image)); // حذف الصورة القديمة
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = $user->id . '.' . $extension;
            $imagePath = 'storage/profile_images/' . $imageName; // المسار داخل public/storage

            // إنشاء المجلد إذا لم يكن موجودًا
            if (!file_exists(public_path('storage/profile_images'))) {
                mkdir(public_path('storage/profile_images'), 0755, true);
            }

            // حفظ الصورة في public/storage/profile_images
            $image->move(public_path('storage/profile_images'), $imageName);

            $user->profile_image = $imagePath; // حفظ المسار في قاعدة البيانات
            $user->save();

            return response()->json(['message' => 'تم رفع الصورة بنجاح', 'image_path' => $imagePath], 200);
        }

        return response()->json(['message' => 'لم يتم رفع أي صورة'], 400);
    }


    public function showProfile($user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json(['message' => 'المستخدم غير موجود'], 404);
        }

        $userData = [
            'id' => $user->id,
            'first-name' => $user->firstName,
            'last-name' => $user->lastName,
            'phone' => $user->phone,
        ];

        if ($user->profile_image) {
            if (Storage::disk('public')->exists($user->profile_image)) {
                $userData['profile_image_url'] = Storage::url($user->profile_image);
            }
        } else {               // مسار لصورة افتراضية إذا ما بدي بس بحط نل وهنن يصطفلو
            $userData['profile_image_url'] = asset('storage/profile_images/default.jpg');
        }

        return response()->json($userData, 200);
    }

    public function editProfile(Request $request){

    }
}
