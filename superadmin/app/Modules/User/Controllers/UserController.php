<?php

namespace App\Modules\User\Controllers;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Modules\User\Services\UserService;
use App\Modules\User\Validators\UserValidator;
use App\Core\Exceptions\ValidationException;

class UserController
{
    public function create(): void
    {
        $body = Request::body();

        $validation = UserValidator::validateCreate($body);

        if (!$validation['valid']) {

            throw new ValidationException(
                $validation['errors']
            );
        }

        $service = new UserService();

        $created = $service->createAdmin($body);

        if (!$created) {

            Response::error(
                'Failed to create user'
            );
        }

        Response::success(
            [],
            'User created successfully'
        );
    }
}
