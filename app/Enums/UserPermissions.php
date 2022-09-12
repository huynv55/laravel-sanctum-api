<?php
namespace App\Enums;

enum UserPermissions: string
{
    case FULL_ACCESS = 'full';
    case READ = 'read';
    case CREATE = 'create';
    case UPDATE = 'update';
    case DELETE = 'delete';
}

?>