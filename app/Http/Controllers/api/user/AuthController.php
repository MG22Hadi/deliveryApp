<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    use GeneralTrait;

    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'first-name' => 'string|max:255',
        'last-name' => 'string|max:255',
        'phone' => 'required|string|max:20|unique:users',
        'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
    ]);

    if ($validator->fails()) {
        $code = $this->returnCodeAccordingToInput($validator);
        return $this->returnValidationError($code, $validator);
    }

    try {
        $user = User::create([
            'first-name' => $request->firstName,
            'last-name' => $request->lastName,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Generate a JWT token for the newly created user
        $token = JWTAuth::fromUser($user);

        // Store the token in the database
        Token::create([
            'user_id' => $user->id,
            'token' => $token,
        ]);

        // Optionally, you can also update the user model with the token
        $user->remember_token = $token; // If you have a user_token field in the users table
        $user->save();

        return $this->returnData('user', $user, ['token' => $token]); // Return user data along with the token
    } catch (\Exception $ex) {
        return $this->returnError($ex->getCode(), $ex->getMessage());
    }
}
    public function login(Request $request): JsonResponse
    {
        try {
            // Validation rules
            $rules = [
                "phone" => "required",
                "password" => "required"
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code, $validator);
            }

            // Attempt to log in and generate a token
            $credentials = $request->only(['phone', 'password']);
            $token = Auth::guard('user-api')->attempt($credentials);

            // Check if token was generated
            if (!$token) {
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة'); // "Login data is incorrect"
            }

            // Get the authenticated user
            $user = Auth::guard('user-api')->user();

            // Store the token in the database

            Token::updateOrCreate(
                ['user_id' => $user->id], // Attributes to check for existing record
                ['token' => $token]       // Attributes to update or create
            );
            // Optionally, you can also update the user model with the token
             $user->remember_token = $token; // If you have a user_token field in the users table
             $user->save();

            // Return the token and user data in the response
            return $this->returnData('user', $user, ['token' => $token]); // Return user data along with the token

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

   public function logout(Request $request): JsonResponse
{
    try {
        // الحصول على التوكن الحالي
        $token = JWTAuth::getToken();


        // الحصول على المستخدم الحالي
        $user = Auth::guard('user-api')->user();
       // dd($user); // تحقق من التوكن


        if (!$user) {
            return $this->returnError('E005', 'المستخدم غير موجود');
        }

        JWTAuth::invalidate($token);
        if ($user) {
            // حذف التوكن من حقل remember_token في جدول users
            $user->remember_token = null;
            $user->save();

            // حذف الصف الكامل من جدول tokens المرتبط بالمستخدم
            Token::where('user_id', $user->id)->delete();
        }

        // إرجاع رسالة نجاح
        return $this->returnSuccessMessage('تم تسجيل الخروج بنجاح');

    } catch (TokenExpiredException $e) {
        // إذا كان التوكن منتهي الصلاحية
        return $this->returnError('E002', 'انتهت صلاحية التوكن');

    } catch (TokenInvalidException $e) {
        // إذا كان التوكن غير صالح
        return $this->returnError('E003', 'التوكن غير صالح');

    } catch (JWTException $e) {
        // إذا حدث خطأ في JWT
        return $this->returnError('E004', 'فشل في تسجيل الخروج: ' . $e->getMessage());

    } catch (\Exception $e) {
        // إذا حدث أي خطأ آخر
        return $this->returnError($e->getCode(), $e->getMessage());
    }
}

public function getUser(Request $request): JsonResponse
{
    try {
        // الحصول على المستخدم الحالي
        $user = Auth::guard('user-api')->user();

        if (!$user) {
            return $this->returnError('E005', 'المستخدم غير موجود');
        }

        // إرجاع بيانات المستخدم
        return $this->returnData('user', $user);

    } catch (\Exception $e) {
        return $this->returnError($e->getCode(), $e->getMessage());
    }
}


}
