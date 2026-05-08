<?php

namespace App\Core\Middleware;

use App\Core\Auth\JWT;
use App\Core\Exceptions\UnauthorizedException;
use App\Core\Http\Request;

class AuthMiddleware
{
    public static function handle(): void
    {
        $token = Request::bearerToken();

        if (!$token) {

            throw new UnauthorizedException(
                'Authentication token missing'
            );
        }

        $decoded = JWT::decode($token);

        if (!$decoded) {

            throw new UnauthorizedException(
                'Invalid token'
            );
        }

        if (
            ($decoded['exp'] ?? 0)
            < time()
        ) {

            throw new UnauthorizedException(
                'Token expired'
            );
        }

        $_SERVER['auth_user'] = json_encode(
            $decoded
        );
    }
}
