<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json([
            'accessToken' => $token,
            'refreshToken' => $this->createRefreshToken(Auth::user())
        ]);
    }

    public function createRefreshToken(?User $user)
    {
        $refreshToken = JWTAuth::fromUser($user);

        return $refreshToken;
    }

    public function updateToken(Request $request)
{
    // Ambil token dari request
    $refreshToken = $request->input('token');

    try {
        JWTAuth::setToken($refreshToken);

        $newToken = JWTAuth::refresh($refreshToken);
    } catch (JWTException $e) {
        return response()->json(['error' => 'Could not refresh token'], 401);
    }

    return response()->json([
        'accessToken' => $newToken,
        'refreshToken' => $refreshToken
    ]);
    }
}