<?php

namespace App\Http\Requests;

use App\ACL\All;
use App\ACL\Group\Admin;
use Illuminate\Foundation\Http\FormRequest;

class GetUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = auth()->user();
        return (new All())->setUser($user)->addGroup(new Admin())->authorize();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
