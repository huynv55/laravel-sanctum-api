<?php
namespace App\ACL;

use App\ACL\Group\GroupACLInterface;
use App\ACL\Permission\PermissionACLInterface;
use App\Models\User;

abstract class ACL implements ACLInterface
{
    protected ?User $user;
    protected ?GroupACLInterface $group;
    protected ?PermissionACLInterface $permission;

    public function __construct()
    {
        $this->user = null;
        $this->group = null;
        $this->permission = null;
    }

    public function setUser(User $user): ACLInterface
    {
        $this->user = $user;
        return $this;
    }

    public function addGroup(GroupACLInterface $group): ACLInterface
    {
        if($this->group === null)
        {
            $this->group = $group->setUser($this->user);
        } else {
            $this->group->add($group->setUser($this->user));
        }
        
        return $this;
    }

    public function addPermission(PermissionACLInterface $permission): ACLInterface
    {
        if($this->permission === null)
        {
            $this->permission = $permission->setUser($this->user);
        } else {
            $this->permission->add($permission->setUser($this->user));
        }
        return $this;
    }

    public function removeGroup(GroupACLInterface $group): ACLInterface
    {
        $this->group->remove($group);
        return $this;
    }

    public function removePermission(PermissionACLInterface $permission): ACLInterface
    {
        $this->permission->remove($permission);
        return $this;
    }

    public function getGroups(): array
    {
        return $this->group->getGroups();
    }

    public function getPermissions(): array
    {
        return $this->permission->getPermissions();
    }

    public function authorize(): bool
    {
        return true;
    }
}

?>