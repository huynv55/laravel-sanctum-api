<?php
namespace App\ACL\Permission;

use App\Enums\UserPermissions;
use App\Models\User;

abstract class BasePermission implements PermissionACLInterface
{
    /**
     * user authorize
     *
     * @var User|null
     */
    protected ?User $user;

    /**
     * array list permissions authorize
     *
     * @var array|null
     */
    protected ?array $permissions;

    /**
     * permission authorize
     *
     * @var UserPermissions|null
     */
    protected ?UserPermissions $permission;

    public function __construct()
    {
        $this->user = null;
        $this->permissions = [];
        $this->permission = null;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

    public function setUser(User $user): PermissionACLInterface
    {
        $this->user = $user;
        return $this;
    }

    public function all(): bool
    {
        return $this->user->hasAllPermissions($this->permissions);
    }

    public function any(): bool
    {
        return $this->user->hasAnyPermission($this->permissions);
    }

    public function add(PermissionACLInterface $acl): PermissionACLInterface
    {
        if(!in_array($acl->permission->value, $this->permissions)) 
        {
            $this->permissions[] = $acl->permission->value;
        }
        return $this;
    }

    public function remove(PermissionACLInterface $acl): PermissionACLInterface
    {
        $offset = array_search($acl->permission->value, $this->permissions);
        if($offset !== false) 
        {
            array_splice($this->permissions, $offset, 1);
        }
        return $this;
    }
}

?>