<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   

    public function register(RegisterRequest $request){
        // $registerUserData = $request->validate([
        //     'name'=>'required|string',
        //     'email'=>'required|string|email|unique:users',
        //     'password'=>'required|min:8',
        //     'password_confirmation' => 'required|same:password' // Parolni tasdiqlash qoidasini qo'shish
        // ])

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully',
            'user' => $user
        ], 201);

    }

    public function login(Request $request){
        $loginUserData = $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|min:8'
        ]);
        $user = User::where('email',$loginUserData['email'])->first();
        if(!$user || !Hash::check($loginUserData['password'],$user->password)){
            return response()->json([
                'message' => 'Invalid Credentials'
            ],401);
        }
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
        return response()->json([
            'access_token' => $token,
        ]);
    }

    public function logout(){
        
        // auth()->user()->tokens()->delete();
        auth()->user()->tokens()->delete();
        
        return response()->json([
          "message"=>"logged out"
        ]);
    }


    
}
