<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;

class Update extends BasePermission
{
    public function __construct(?PermissionACLInterface $per = null)
    {
        parent::__construct();
        $this->permission = UserPermissions::UPDATE->value;
        if($per !== null) {
            $this->add($per);
        }
    }
}
?>