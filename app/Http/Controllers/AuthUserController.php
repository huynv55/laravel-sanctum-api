<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserLogoutRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\Auth\AuthUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthUserController extends AuthBaseController
{
    public AuthUserService $authUserService;

    public function __construct(AuthUserService $authUserService)
    {
        $this->authUserService = $authUserService;
    }

    public function login(UserLoginRequest $request) : JsonResponse
    {
        $resource = $this->authUserService->login($request);
        return response()->json($resource);
    }

    public function logout(UserLogoutRequest $request) : JsonResponse
    {
        $resource = $this->authUserService->logout($request);
        return response()->json($resource);
    }

    public function register(UserRegisterRequest $request) : JsonResponse
    {
        $resource = $this->authUserService->register($request);
        return response()->json($resource);
    }
}
