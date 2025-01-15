<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Illuminate\Validation\Rules\Password;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
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

    /**
     * Register a new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first-name' => 'string|max:255',
            'last-name' => 'string|max:255',
            'phone' => 'required|string|max:10|min:10|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
        ]);

        if ($validator->fails()) {
            return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
        }

        try {
            $token = $this->authService->register($request->all());
            return $this->returnData('token' , $token);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }

    /**
     * Login a user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $rules = [
                "phone" => "required",
                "password" => "required",
                "remember_me" => "boolean"
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
            }

            $credentials = $request->only(['phone', 'password']);
            $rememberMe = $request->input('remember_me', false);

            $token = $this->authService->login($credentials, $rememberMe);
            return $this->returnData('token' , $token);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout();
            return $this->returnSuccessMessage('تم تسجيل الخروج بنجاح');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function getUser()
    {
        try {
            $user = $this->authService->getUser();
            return $this->returnData('user', $user);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }


    /**
     * Update user information.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request)
    {
        try {
            // التحقق من صحة البيانات
            $validator = Validator::make($request->all(), [
                'first-name' => 'string|max:255',
                'last-name' => 'string|max:255',
                'phone' => 'string|max:20|unique:users,phone,' . Auth::guard('user-api')->id(),
            ]);

            if ($validator->fails()) {
                return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
            }

            // الحصول على المستخدم الحالي باستخدام الـ Token
            $user = Auth::guard('user-api')->user();

            if (!$user) {
                return $this->returnError('E005', 'المستخدم غير موجود');
            }

            // تحديث المعلومات
            if ($request->has('first-name')) {
                $user->{'first-name'} = $request->input('first-name');
            }
            if ($request->has('last-name')) {
                $user->{'last-name'} = $request->input('last-name');
            }
            if ($request->has('phone')) {
                $user->phone = $request->input('phone');
            }


            // حفظ التغييرات
            $user->save();

            // إرجاع بيانات المستخدم المحدثة
            return $this->returnData('user', $user, 'تم تحديث المعلومات بنجاح');
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
    public function changePassword(Request $request)
    {
        try {
            // التحقق من صحة البيانات
            $validator = Validator::make($request->all(), [
                'current_password' => 'required|string',
                'new_password' => ['required', 'confirmed', Password::min(8)->mixedCase()->numbers()],
            ]);

            if ($validator->fails()) {
                return $this->returnValidationError($this->returnCodeAccordingToInput($validator), $validator);
            }

            // الحصول على المستخدم الحالي باستخدام الـ Token
            $user = Auth::guard('user-api')->user();

            if (!$user) {
                return $this->returnError('E005', 'المستخدم غير موجود');
            }

            // التحقق من أن كلمة المرور الحالية صحيحة
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return $this->returnError('E006', 'كلمة المرور الحالية غير صحيحة');
            }

            // تحديث كلمة المرور
            $user->password = Hash::make($request->input('new_password'));
            $user->save();

            // إنشاء Token جديد
            $newToken = JWTAuth::fromUser($user);

            // إرجاع رسالة نجاح مع الـ Token الجديد
           return $this->returnData('token' , $newToken);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
