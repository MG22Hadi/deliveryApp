<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function uploadImage(Request $request, $user_id)
    {
        $user = User::find($user_id);


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
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();
                $imageName = $user->id . '.' . $extension;
                $imagePath = 'profile_images/' . $imageName;

                Storage::disk('public')->put($imagePath, file_get_contents($image));

            $user->profile_image = $imagePath;
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
            $userData['profile_image_url'] = asset('/storage/profile_images/default.jpg');
        }

        return response()->json($userData, 200);
    }
}
