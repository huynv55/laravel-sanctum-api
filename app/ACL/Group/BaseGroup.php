<?php
namespace App\ACL\Group;

use App\Enums\UserRoles;
use App\Models\User;

abstract class BaseGroup implements GroupACLInterface
{
    protected ?User $user;
    protected ?array $groups;
    protected ?UserRoles $group;

    public function __construct()
    {
        $this->user = null;
        $this->groups = [];
        $this->group = null;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function setUser(User $user): GroupACLInterface
    {
        $this->user = $user;
        return $this;
    }

    public function all(): bool
    {
        return $this->user->hasAllGroups($this->groups);
    }

    public function any(): bool
    {
        return $this->user->hasAnyGroup($this->groups);
    }

    public function add(GroupACLInterface $acl): GroupACLInterface
    {
        if(!in_array($acl->group->value, $this->groups)) 
        {
            $this->groups[] = $acl->group->value;
        }
        return $this;
    }

    public function remove(GroupACLInterface $acl): GroupACLInterface
    {
        $offset = array_search($acl->group->value, $this->groups);
        if($offset !== false) 
        {
            array_splice($this->groups, $offset, 1);
        }
        return $this;
    }
}

?>