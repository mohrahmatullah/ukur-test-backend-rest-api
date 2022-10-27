<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\requestRegister;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(requestRegister $request)
    {
        // register username & password
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
         ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // Return Response Data, Akses Token, Type Token
        return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    public function login(Request $request)
    {
        // cek auth username & password
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // get username berdasarkan request
        $user = User::where('username', $request['username'])->firstOrFail();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return Response Message, Akses Token, Type Token
        return response()->json(['message' => 'Hi '.$user->username.', welcome to home','access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        // delete token
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

}
