<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => ['required','email'],
            'password' => ['min:8'],
        ]);

        $user = User::create($validatedData);
        // dd($user);
        // $token = $user->createToken("auth")->accessToken;
// dd($token);
        return response()->json(
            [
                // 'token' => $token,
                'user' => $user,
                'message' => 'User Created Successfuly',
                'status' => 1,
            ]
            );
    }

    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $user = User::where(['email' => $validatedData['email'], 'password' => $validatedData['password']])->first();
        // $token = $user->createToken("auth_token")->accessToken;
        return response()->json(
            [
                // 'token' => $token,
                'user' => $user,
                'message' => 'Logged In Successfuly',
                'status' => 1,
            ]
            );
    }
        
}

