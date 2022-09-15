<?php
namespace App\ACL\Permission;

use App\Models\User;

interface PermissionACLInterface
{
    /**
     * get array list permissions
     *
     * @return array
     */
    public function getPermissions() : array;

    /**
     * set user check permission authorize
     *
     * @param User $user
     * @return PermissionACLInterface
     */
    public function setUser(User $user): PermissionACLInterface;

    /**
     * check all permission authorize
     *
     * @return boolean
     */
    public function all(): bool;

    /**
     * check any permission authorize
     *
     * @return boolean
     */
    public function any(): bool;

    /**
     * add permission authorize
     *
     * @param PermissionACLInterface $acl
     * @return PermissionACLInterface
     */
    public function add(PermissionACLInterface $acl) : PermissionACLInterface;

    /**
     * remove permission authorize
     *
     * @param PermissionACLInterface $acl
     * @return PermissionACLInterface
     */
    public function remove(PermissionACLInterface $acl): PermissionACLInterface;
}

?>