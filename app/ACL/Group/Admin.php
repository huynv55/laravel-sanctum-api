<?php
namespace App\ACL\Group;

use App\Enums\UserRoles;

class Admin extends BaseGroup
{
    public function __construct(?GroupACLInterface $g = null)
    {
        parent::__construct();
        $this->group = UserRoles::ADMIN;
        if($g !== null ) {
            $this->add($g);
        }
    }
}
?>