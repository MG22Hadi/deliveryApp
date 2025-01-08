<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Illuminate\Validation\Rules\Password;

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

    public function getUser(Request $request)
    {
        try {
            $user = $this->authService->getUser();
            return $this->returnData('user', $user);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }
}
