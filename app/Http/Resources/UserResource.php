<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        if($this->user) {
            return [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'email' => $this->user->email,
                'email_verified_at' => $this->user->email_verified_at
            ];
        }
        else {
            return [];    
        }
    }

    public function setUser(User $user) 
    {
        $this->user = $user;
    }
}
