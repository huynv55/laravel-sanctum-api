<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Junges\ACL\Concerns\HasGroups;
use Junges\ACL\Concerns\HasPermissions;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasGroups, HasPermissions, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * check password is matched by user
     *
     * @param string $pass
     * @return boolean
     */
    public function verifyPassword(string $pass) : bool
    {
        return Hash::check($pass, $this->password);
    }
}
