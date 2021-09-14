<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    /**
     * Register new user
     * @param \Illuminate\Http\Request  $request
    */
    public function register(Request $request) {
        $fields = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|unique:users|email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name'  => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('api_token')->plainTextToken;
        return [
            'user' => $user,
            'api_token' => $token
        ];
    }
    /**
     * Login user
     * @param \Illuminate\Http\Request  $request
    */
    public function login(Request $request) {
        $fields = $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('email','like',$fields['email'])->first();
        if(!$user || !Hash::check($fields['password'],$user->password)) {
            return response()->json([
                    'message' => 'incorrect email or password',
                    401
                ]
            );
        }
        $token = $user->createToken('api_token')->plainTextToken;
        return [
            'user' => $user,
            'api_token' => $token
        ];
    }
    /**
     * Log Out user
    */
    public function logout() {
        return auth()->user()->tokens()->delete();
    }
}
