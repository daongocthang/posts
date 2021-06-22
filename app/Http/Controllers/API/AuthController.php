<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return response()->json(['user' => $user, 'msg' => 'Registered Successfully.'], 200);
    }

    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();
        if (auth('web')->attempt($validated)) {
            $user = auth()->user();
            $token = $user->createToken('myAuthApp')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token]);
        } else {
            return response()->json(['msg' => 'Log in failed'], 500);
        }

    }

    public function show()
    {
        return auth()->user();
    }
}
