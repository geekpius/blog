<?php

namespace App\Http\Controllers;

use App\Http\Actions\Auth\LoginAction;
use App\Http\Actions\Auth\RegisterAction;
use App\Http\Actions\Posts\CreatePostAction;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return $action->handle($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register(RegisterRequest $request, RegisterAction $action): JsonResponse
    {
        return $action->handle($request);
    }

}
