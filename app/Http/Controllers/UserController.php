<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetUserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Services\Auth\AuthUserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected UserRepository $repository;
    protected AuthUserService $auth;
    public function __construct(UserRepository $userRepository, AuthUserService $auth)
    {
        $this->repository = $userRepository;
        $this->auth = $auth;
    }

    public function user(GetUserRequest $request) : JsonResponse
    {
        $resource = new UserResource([]);
        $resource->setUser($this->auth->getAuthenticated());
        return response()->json($resource);
    }
}
