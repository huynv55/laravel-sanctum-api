<?php
namespace App\ACL\Group;

use App\Models\User;

interface GroupACLInterface {

    /**
     * get array list groups
     *
     * @return array
     */
    public function getGroups(): array;
    
    /**
     * set user for check group authorize
     *
     * @param User $user
     * @return GroupACLInterface
     */
    public function setUser(User $user): GroupACLInterface;

    /**
     * check all group authorize
     *
     * @return boolean
     */
    public function all(): bool;

    /**
     * check any group authorize
     *
     * @return boolean
     */
    public function any(): bool;

    /**
     * add group authorize
     *
     * @param GroupACLInterface $acl
     * @return GroupACLInterface
     */
    public function add(GroupACLInterface $acl) : GroupACLInterface;

    /**
     * remove group authorize
     *
     * @param GroupACLInterface $acl
     * @return GroupACLInterface
     */
    public function remove(GroupACLInterface $acl): GroupACLInterface;
}

?>