<?php
namespace App\ACL;

class Any extends ACL
{
    public function authorize(): bool
    {
        if(parent::authorize())
        {
            $result = true;
            if($this->group !== null) {
                $result = $result && $this->group->any();
            }
            if($this->permission !== null) {
                $result = $result && $this->permission->any();
            }
            return $result;
        }
        else {
            return false;
        }
    }
}
?>