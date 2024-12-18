<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\GeneralTrait;

class AuthController extends Controller
{
    //
    use GeneralTrait;

    public function login(Request $request)
    {

     try {
        $rules = [

            "password" => "required",
            "email" => "required"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
//            return response()->json(['message' => 'القسم غير موجود'], 400);
        }

        //login

        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('user-api')->attempt($credentials);  //generate token

        if (!$token) {
            //return response()->json(['message' => 'القسم '], 300);
            return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
        }

        $user = Auth::guard('user-api')->user();
        $user ->user_token = $token;
        //return token
        return $this->returnData('user', $user);  //return json response

//         return response()->json(['message' => 'القسم  موجود'], 222);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());

        }
    }

}
