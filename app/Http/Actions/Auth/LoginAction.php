<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginAction{
    use ApiResponseTrait;

    public function handle(LoginRequest $request): JsonResponse
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return $this->apiErrorResponse('The provided credentials are incorrect', 401);
        }

        Auth::user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'token' => Auth::user()->createToken($request->email)->plainTextToken,
            'data' => new UserResource(auth()->user()),
        ]);
    }
}
