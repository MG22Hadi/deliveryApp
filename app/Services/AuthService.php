<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return string
     */
    public function register(array $data): string
    {
        $user = User::create([
            'first-name' => $data['firstName'],
            'last-name' => $data['lastName'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        // تعيين المستخدم المسجل كمستخدم حالي
        Auth::guard('user-api')->login($user);

        // Generate a JWT token for the newly created user
        return JWTAuth::fromUser($user);
    }

    /**
     * Login a user.
     *
     * @param array $credentials
     * @param bool $rememberMe
     * @return string
     * @throws \Exception
     */
    public function login(array $credentials, bool $rememberMe = false): string
    {
        $token = Auth::guard('user-api')->attempt($credentials);

        if (!$token) {
            throw new \Exception('بيانات الدخول غير صحيحة', 401);
        }

        return $token;
    }

     /**
     * Logout the user.
     *
     * @return void
     * @throws \Exception
     */
    public function logout()
    {
        try {
            $user = Auth::guard('user-api')->user();

            if (!$user) {
                throw new \Exception('User not found', 404);
            }

            // Invalidate the token
            JWTAuth::invalidate(JWTAuth::getToken());


        } catch (\Exception $e) {
            throw new \Exception('Failed to logout: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get the authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     * @throws \Exception
     */
    public function getUser()
    {
        $user = Auth::guard('user-api')->user();

        if (!$user) {
            throw new \Exception('User not found', 404);
        }

        return $user;
    }

}
