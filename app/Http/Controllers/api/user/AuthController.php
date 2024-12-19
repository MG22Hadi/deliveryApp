<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    use GeneralTrait;

//    public function login(Request $request)
//    {
//
//     try {
//        $rules = [
//            "phone" => "required",
//            "password" => "required"
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            $code = $this->returnCodeAccordingToInput($validator);
//            return $this->returnValidationError($code, $validator);
//        }
//
//        //login
//
//        $credentials = $request->only(['phone', 'password']);
//        $token = JWTAuth::guard('user-api')->attempt($credentials);  //generate token
//
//
//        if (!$token) {
//            return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
//        }
//
//        $user = Auth::guard('user-api')->user();
//        $user ->user_token = $token;
//        $user = User::where('email', $request->email)->first();
//        Token::create([
//            'user_id' => $user->id,
//            'token' => $token,
//        ]);
//
//        return response()->json(compact('token'));
//        //return token
//        return $this->returnData('user', $user);  //return json response
//
//
//        } catch (\Exception $ex) {
//            return $this->returnError($ex->getCode(), $ex->getMessage());
//
//        }
//    }

    public function login(Request $request) {
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
            $user = JWTAuth::guard('user-api')->user();

            // Store the token in the database

            Token::create([
                'user_id' => $user->id,
                'token' => $token,
            ]);

            // Optionally, you can also update the user model with the token
             $user->remember_token = $token; // If you have a user_token field in the users table
             $user->save();

            // Return the token and user data in the response
            return $this->returnData('user', $user, ['token' => $token]); // Return user data along with the token

        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function logout(Request $request) {
            // Get the token from the request header
    $token = $request->header('auth-token');

    // Check if the token is provided
    if (!$token) {
        return $this->returnError('', 'Token not provided');
    }

    try {
        // Invalidate the token
        JWTAuth::invalidate($token);

        // Optionally, store the token in a blacklist


        return $this->returnSuccessMessage('Logged out successfully');
    } catch (TokenInvalidException $e) {
        return $this->returnError('', 'Token is invalid');
    } catch (TokenExpiredException $e) {
        return $this->returnError('', 'Token has expired');
    } catch (JWTException $e) {
        return $this->returnError('', 'Could not invalidate token');
    } catch (\Exception $e) {
        return $this->returnError('', 'Something went wrong: ' . $e->getMessage());
    }


    }


}
