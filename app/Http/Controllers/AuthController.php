<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            
            return response()->json(['token' => $token], 200);
        }
    

        return response()->json(['error' => 'These credentials do not match our records.'], 401);

    }

    public function register(RegisterRequest $request)
    {
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json(['token' => $token], 201);
    }

    return response()->json(['error' => 'Failed to generate token.'], 500);
    }

    public function show()
    {
        $users = User::all();

        return response()->json($users);
    }
}

