<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;

class Delete extends BasePermission
{
    public function __construct(?PermissionACLInterface $per = null)
    {
        parent::__construct();
        $this->permission = UserPermissions::DELETE->value;
        if($per !== null) {
            $this->add($per);
        }
    }
}
?>