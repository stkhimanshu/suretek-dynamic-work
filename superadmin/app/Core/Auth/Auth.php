<?php

namespace App\Core\Auth;

class Auth
{
    public static function user(): ?array
    {
        if (
            !isset($_SERVER['auth_user'])
        ) {
            return null;
        }

        return json_decode(
            $_SERVER['auth_user'],
            true
        );
    }
}
