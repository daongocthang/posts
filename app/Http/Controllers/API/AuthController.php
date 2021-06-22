<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return response()->json(['user' => $user, 'msg' => 'Registered Successfully.'], 200);
    }

    public function login(UserLoginRequest $request)
    {
        $validated = $request->validated();

    }
}
