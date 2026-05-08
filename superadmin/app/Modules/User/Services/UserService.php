<?php

namespace App\Modules\User\Services;

use App\Modules\User\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function createAdmin(array $data): bool
    {
        return $this->userRepository->create([
            'uuid' => uniqid('usr_', true),
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ?? null,
            'email' => strtolower($data['email']),
            'username' => strtolower($data['username']),
            'password_hash' => password_hash(
                $data['password'],
                PASSWORD_ARGON2ID
            ),
            'role_id' => 2,
        ]);
    }
}
