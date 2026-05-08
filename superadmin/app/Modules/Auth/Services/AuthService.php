<?php

namespace App\Modules\Auth\Services;

use App\Core\Auth\JWT;
use App\Core\Exceptions\UnauthorizedException;
use App\Modules\User\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository =
            new UserRepository();
    }

    public function login(
        array $data
    ): string {

        $user =
            $this->userRepository
            ->findByEmail(
                $data['email']
            );

        if (!$user) {

            throw new UnauthorizedException(
                'Invalid credentials'
            );
        }

        if (
            !password_verify(
                $data['password'],
                $user['password_hash']
            )
        ) {

            throw new UnauthorizedException(
                'Invalid credentials'
            );
        }

        return JWT::encode([

            'id' => $user['id'],

            'uuid' => $user['uuid'],

            'email' => $user['email'],

            'role_id' => $user['role_id'],

            'exp' => time() + (60 * 60 * 24),
        ]);
    }
}
