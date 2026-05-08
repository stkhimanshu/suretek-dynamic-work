<?php

namespace App\Modules\User\Repositories;

use App\Core\Database\DB;
use App\Modules\User\Models\User;

class UserRepository
{
    public function findByEmail(string $email): ?array
    {
        return User::query()
            ->where('email', '=', $email)
            ->first();
    }

    public function create(array $data): bool
    {
        return DB::table('users')->insert($data);
    }
}
