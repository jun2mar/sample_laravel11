<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        
        $login_type = filter_var($request->email, FILTER_VALIDATE_EMAIL ) ? 'email' : 'username';

        $request->merge([
            $login_type => $request->email
        ]);

        $credentials = $request->only($login_type, 'password');

        $validator = \Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ],[],[
            'email' => 'Email',
            'password' => 'Password',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 401);
        }

        try {
            if (!auth()->attempt($credentials)){
                return response()->json("Invalid account", 401);
            }

            $user = auth()->user();
            
            return $this->getuserinfo($request);
        } catch (\Throwable $e) {
            throw $e;
            return Helper::error_handler(array( 'alert' => 'Invalid account'));
        }
    }

    public function getuserinfo($request = null){
        $user = $this->userinfo();
        return $this->getusertoken($user);
    }

    public function getusertoken($user = null){
        $accessToken = null;
        if($user){
            $accessToken = $user->createToken($user->email)->plainTextToken;
            $accessToken = explode("|", $accessToken);
        }
        $arr = [
            'user' => $this->userinfo(),
        ];

        if($accessToken){
            $arr['token'] = $accessToken[1];
        }

        return response()->json($arr, 200);
    }

    public function userinfo(){
        $user = Auth::user();
        return $user;
    }
}
