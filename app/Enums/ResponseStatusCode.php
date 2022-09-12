<?php
namespace App\Enums;

enum ResponseStatusCode: int
{
    case Unauthenticated = 401;
    case Forbidden = 403;
    case InternalServerError = 500;
}

?>