<?php

namespace App\Http\Actions\Auth;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;

class RegisterAction{
    use ApiResponseTrait;

    public function handle(RegisterRequest $request): JsonResponse
    {
        try {
            $user = User::create($request->validated());

            logger('User created');

            return response()->json([
                'success' => true,
                'token' => $user->createToken($request->email)->plainTextToken,
                'data' => new UserResource($user),
            ]);

        }catch (\Exception $exception){
            report($exception);
        }

        return $this->apiErrorResponse();

    }
}
