<?php
namespace App\ACL;

use App\ACL\Group\GroupACLInterface;
use App\ACL\Permission\PermissionACLInterface;
use App\Models\User;

interface ACLInterface
{

    /**
     * set user authorize
     *
     * @param User $user
     * @return ACLInterface
     */
    public function setUser(User $user): ACLInterface;

    /**
     * add group check authorize
     *
     * @param GroupACLInterface $group
     * @return ACLInterface
     */
    public function addGroup(GroupACLInterface $group): ACLInterface;

    /**
     * add permission authorize
     *
     * @param PermissionACLInterface $permission
     * @return ACLInterface
     */
    public function addPermission(PermissionACLInterface $permission) : ACLInterface;

    /**
     * remove group user authorize
     *
     * @param GroupACLInterface $group
     * @return ACLInterface
     */
    public function removeGroup(GroupACLInterface $group): ACLInterface;

    /**
     * remove Permission user authorize
     *
     * @param PermissionACLInterface $permission
     * @return ACLInterface
     */
    public function removePermission(PermissionACLInterface $permission) : ACLInterface;

    /**
     * get arry list groups authorize
     *
     * @return array
     */
    public function getGroups(): array;

    /**
     * get array list permissions authorize
     *
     * @return array
     */
    public function getPermissions(): array;

    /**
     * authorize user
     *
     * @return boolean
     */
    public function authorize() : bool;
}

?>