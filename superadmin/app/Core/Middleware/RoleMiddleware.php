<?php

namespace App\Core\Middleware;

use App\Core\Auth\Auth;
use App\Core\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    public static function handle(
        array $roles = []
    ): void {

        $user = Auth::user();

        if (!$user) {

            throw new UnauthorizedException();
        }

        if (
            !in_array(
                $user['role'],
                $roles
            )
        ) {

            throw new UnauthorizedException(
                'Insufficient permissions'
            );
        }
    }
}
