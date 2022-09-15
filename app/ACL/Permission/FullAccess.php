<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;

class FullAccess extends BasePermission
{
    public function __construct(?PermissionACLInterface $per = null)
    {
        parent::__construct();
        $this->permission = UserPermissions::FULL_ACCESS->value;
        if($per !== null) {
            $this->add($per);
        }
    }
}
?>