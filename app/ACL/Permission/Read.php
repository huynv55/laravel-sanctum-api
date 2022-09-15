<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;

class Read extends BasePermission
{
    public function __construct(?PermissionACLInterface $per = null)
    {
        parent::__construct();
        $this->permission = UserPermissions::READ->value;
        if($per !== null) {
            $this->add($per);
        }
    }
}
?>