<?php
namespace App\Services\Auth;

use App\Http\Resources\AuthLogoutResource;
use App\Http\Resources\AuthUserResource;
use App\Models\User;
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
            $user = $this->getAuthenticated();
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

    public function checkIsLogin(): bool
    {
        return auth()->check();
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
        if($this->checkIsLogin())
        {
            if($request->input('force', 0)) {
                [$id, $token] = explode('|', $request->bearerToken(), 2);
                $this->getAuthenticated()->tokens()->find($id)->delete();
            }
            else {
                // delete all access tokens that belong to user.
                $this->getAuthenticated()->tokens()->delete();
            }
            return new AuthLogoutResource([]);
        }
        throw new AuthenticationException();
    }

    public function getAuthenticated(): ?User
    {
        return auth('sanctum')->user();
    }
}
?>