<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
{
    protected ?User $user = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        return [
            'token' => $this->getToken(),
            'user' => $this->getUserArray()
        ];
    }

    public function setUser(User $user) 
    {
        $this->user = $user;
    }

    public function getToken() : string
    {
        if($this->user) {
            $token = request()->bearerToken();
            if(empty($token)) {
                $token = $this->user->createToken('auth');
                return $token->plainTextToken;
            } else {
                return $token;
            }
        }
        else {
            return '';    
        }
    }

    public function getUserArray() : array
    {
        if($this->user) {
            return [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email
            ];
        }
        else {
            return [];    
        }
    }
}
