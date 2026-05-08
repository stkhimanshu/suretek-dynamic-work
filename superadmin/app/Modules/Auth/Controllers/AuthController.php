<?php

namespace App\Modules\Auth\Controllers;

use App\Core\Exceptions\ValidationException;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Modules\Auth\Services\AuthService;
use App\Modules\Auth\Validators\AuthValidator;

class AuthController
{
    public function login(): void
    {
        $body = Request::body();

        $validation =
            AuthValidator::validateLogin(
                $body
            );

        if (!$validation['valid']) {

            throw new ValidationException(
                $validation['errors']
            );
        }

        $service = new AuthService();

        $token = $service->login($body);

        Response::success([
            'token' => $token
        ], 'Login successful');
    }
}
