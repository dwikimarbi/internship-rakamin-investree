<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public int $successStatus = 200;

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse|string
    {
        try {
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ])) {
                $user = Auth::user();

                $token = $user->createToken(now()->timestamp)->accessToken;

                return $this->success([
                    'token' => $token,
                ], $this->successStatus);
            }

            return $this->error('Email or password incorrect', [], 403);
        } catch (\Exception $e) {

            return $this->error('Server error, please try again later', $e->getMessage());
        }
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse|string
    {
        try {
            $user = User::create($request->all());

            $accessToken = $user->createToken(now()->timestamp)->accessToken;

            return $this->success([
                'token' => $accessToken,
            ], $this->successStatus);
        } catch (\Exception $e) {

            return $this->error('Error, please try again later', $e->getMessage());
        }
    }

    public function check(): \Illuminate\Http\JsonResponse
    {
        try {

            return $this->success(Auth::user(), $this->successStatus);
        } catch (\Exception $e) {

            return $this->error('Error, please try again later', $e->getMessage());
        }
    }
}
