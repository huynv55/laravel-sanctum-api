<?php
namespace App\Enums;

enum UserRoles: string
{
    case SUPER = 'super';
    case ADMIN = 'admin';
    case GUEST = 'guest';
}

?>