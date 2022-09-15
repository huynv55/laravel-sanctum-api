<?php
namespace App\ACL\Group;

use App\Enums\UserRoles;

class Super extends BaseGroup
{
    public function __construct(?GroupACLInterface $g = null)
    {
        parent::__construct();
        $this->group = UserRoles::SUPER;
        if($g !== null ) {
            $this->add($g);
        }
    }
}
?>