<?php

namespace App\Http\Requests;

use App\ACL\ACL;
use Illuminate\Foundation\Http\FormRequest;

class ACLRequest extends FormRequest
{
    protected ?ACL $acl;
    public function setACL(ACL $acl) : ACLRequest
    {
        $this->acl = $acl;
        return $this;
    }

    public function getACL() : ?ACL
    {
        return $this->acl;
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
