<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login
    public function login(LoginRequest $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = User::where('email', $request->email)->first();

        // Cek token dengan nama khusus role
        $tokenName = 'token_' . strtolower(str_replace(' ', '_', $user->role));

        // Cari token lama berdasarkan nama
        $existingToken = $user->tokens()->where('name', $tokenName)->first();

        if (!$existingToken) {
            // Buat token baru kalau belum ada
            $abilities = $user->getAllPermissions()->pluck('name')->toArray();
            $abilities = array_map(function ($ability) {
                return explode('_', $ability)[0];
            }, array_filter($abilities, function ($ability) {
                return strpos($ability, ':') !== false;
            }));

            $token = $user->createToken($tokenName, $abilities)->plainTextToken;
        } else {
            // Gunakan token yang sudah ada
            $token = $existingToken->plainTextToken ?? $existingToken->accessToken; // fallback
        }

        return new LoginResource([
            'token' => $token,
            'user' => $user
        ]);
    }

    return response()->json([
        'message' => 'Invalid Credentials'
    ], 401);
}

    //register
    // public function register(RegisterRequest $request)
    // {
    //     //save user to user table
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     $token = $user->createToken('token')->plainTextToken;
    //     //return token
    //     return new LoginResource([
    //         'token' => $token,
    //         'user' => $user
    //     ]);
    // }

    //logout
    public function logout(Request $request)
    {
        //hapus semua tuken by user
        $request->user()->tokens()->delete();
        //response no content
        return response()->noContent();
    }    //
}
