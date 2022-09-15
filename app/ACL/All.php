<?php
namespace App\ACL;

class All extends ACL
{
    public function authorize(): bool
    {
        if(parent::authorize())
        {
            $result = true;
            if($this->group !== null) {
                $result = $result && $this->group->all();
            }
            if($this->permission !== null) {
                $result = $result && $this->permission->all();
            }
            return $result;
        }
        else {
            return false;
        }
    }
}
?>