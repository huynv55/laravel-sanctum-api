<?php
namespace App\Services\Auth;

use App\Http\Resources\AuthLogoutResource;
use App\Http\Resources\AuthUserResource;
use App\Repositories\UserRepository;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthUserService implements AuthServiceInterface
{
    public UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function login(Request $request) : AuthUserResource
    {
        if(auth()->attempt($request->only('email', 'password')))
        {
            $user = auth()->user();
            $res = new AuthUserResource([]);
            $res->setUser($user);
            return $res;
        }
        throw new AuthenticationException();
    }

    public function register(Request $request): AuthUserResource
    {
        $post_data = $request->only([
            'email', 'name', 'password'
        ]);
        $post_data['password'] = $this->hashPassword($post_data['password']);
        $user = $this->userRepository->create($post_data);
        $res = new AuthUserResource([]);
        $res->setUser($user);
        return $res;
    }

    public function checkIsLogin(Request $request): bool
    {
        if(!empty($request->user())) {
            return true;
        }
        return false;
    }

    public function hashPassword(string $password): string
    {
        return Hash::make($password);
    }

    public function verifyPassword(string $password, string $hashed): bool
    {
        return Hash::check($password, $hashed);
    }

    public function logout(Request $request): Responsable
    {
        if($this->checkIsLogin($request))
        {
            $request->user()->currentAccessToken()->delete();
            return new AuthLogoutResource([]);
        }
        throw new AuthenticationException();
    }
}
?>