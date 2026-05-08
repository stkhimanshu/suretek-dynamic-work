<?php

namespace App\Modules\User\Services;

use App\Core\Auth\JWT;
use App\Modules\User\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(array $data): ?array
    {
        $user = $this->userRepository
            ->findByEmail($data['email']);

        if (!$user) {
            return null;
        }

        if (!password_verify(
            $data['password'],
            $user['password_hash']
        )) {
            return null;
        }

        $token = JWT::encode([
            'id' => $user['id'],
            'email' => $user['email'],
            'role_id' => $user['role_id'],
            'exp' => time() + 3600,
        ]);

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
