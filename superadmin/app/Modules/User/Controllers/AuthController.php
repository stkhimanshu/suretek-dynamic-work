<?php

namespace App\Modules\User\Controllers;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Modules\User\Services\AuthService;
use App\Modules\Auth\Validators\AuthValidator;
use App\Core\Exceptions\ValidationException;

class AuthController
{
    public function login(): void
    {
        $body = Request::body();

        $validation = AuthValidator::validateLogin($body);

        if (!$validation['valid']) {

            throw new ValidationException(
                $validation['errors']
            );
        }

        $authService = new AuthService();

        $result = $authService->login($body);

        if (!$result) {
            Response::error('Invalid credentials', 401);
        }

        Response::success($result, 'Login successful');
    }
}
