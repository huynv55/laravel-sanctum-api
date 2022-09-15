<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;

class Create extends BasePermission
{
    public function __construct(?PermissionACLInterface $per = null)
    {
        parent::__construct();
        $this->permission = UserPermissions::CREATE->value;
        if($per !== null) {
            $this->add($per);
        }
    }
}
?>