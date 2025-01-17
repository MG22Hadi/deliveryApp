<?php

namespace App\Services;

use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class DriverAuthService
{
    /**
     * Register a new driver.
     *
     * @param array $data
     * @return string
     */
    public function register(array $data): string
    {
        $driver = Driver::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'image' => '127.0.0.1:8000/storage/profile_images/default.jpg',

        ]);

        // تعيين السائق المسجل كسائق حالي
        Auth::guard('driver-api')->login($driver);

        // Generate a JWT token for the newly created driver
        return JWTAuth::fromUser($driver);
    }

    /**
     * Login a driver.
     *
     * @param array $credentials
     * @return string
     * @throws \Exception
     */
    public function login(array $credentials): string
    {
        $token = Auth::guard('driver-api')->attempt($credentials);

        if (!$token) {
            throw new \Exception('بيانات الدخول غير صحيحة', 401);
        }

        return $token;
    }

    /**
     * Logout the driver.
     *
     * @return void
     * @throws \Exception
     */
    public function logout()
    {
        try {
            $driver = Auth::guard('driver-api')->user();

            if (!$driver) {
                throw new \Exception('Driver not found', 404);
            }

            // Invalidate the token
            JWTAuth::invalidate(JWTAuth::getToken());
        } catch (\Exception $e) {
            throw new \Exception('Failed to logout: ' . $e->getMessage(), 500);
        }
    }

    /**
     * Get the authenticated driver.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     * @throws \Exception
     */
    public function getDriver()
    {
        $driver = Auth::guard('driver-api')->user();

        if (!$driver) {
            throw new \Exception('Driver not found', 404);
        }

        return $driver;
    }
}
