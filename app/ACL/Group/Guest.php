<?php
namespace App\ACL\Group;

use App\Enums\UserRoles;

class Guest extends BaseGroup
{
    public function __construct(?GroupACLInterface $g = null)
    {
        parent::__construct();
        $this->group = UserRoles::GUEST;
        if($g !== null ) {
            $this->add($g);
        }
    }
}
?>