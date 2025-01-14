<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        // استرجاع الـ Token من Cookie
        $token = $request->cookie('jwt_token');

        if (!$token) {
            return redirect()->route('admin.login');
        }

        // التحقق من الـ Token
        try {
            $user = JWTAuth::setToken($token)->authenticate();
        } catch (JWTException $e) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
