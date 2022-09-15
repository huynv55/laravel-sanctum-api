<?php
namespace App\Services\Auth;

use App\Models\User;
use App\Services\AppServiceInterface;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;

interface AuthServiceInterface extends AppServiceInterface
{

    public function register(Request $request) : Responsable;

    public function login(Request $request) : Responsable;

    public function checkIsLogin() : bool;

    public function hashPassword(string $password) : string;

    public function verifyPassword(string $password, string $hashed) : bool;

    public function logout(Request $request) : Responsable;

    public function getAuthenticated(): ?User;
}

?>