<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ],[],[
            'name' => 'Name',
            'username' => 'Email',
            'password' => 'Password',
        ]);

        if($validator->fails()){
            return response()->json($validator->messages(), 500);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return response()->json("User created successfully", 200);
    }

    public function show(){
        $user = auth()->user();
        return response()->json($user, 200);
    }
}
