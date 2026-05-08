<?php

namespace App\Modules\Auth\Validators;

use App\Core\Validation\Validator;

class AuthValidator
{
    public static function validateLogin(
        array $data
    ): array {

        $validator = new Validator();

        $valid = $validator->validate($data, [

            'email' => 'required|email',

            'password' => 'required|min:8',
        ]);

        return [
            'valid' => $valid,
            'errors' => $validator->errors(),
        ];
    }
}
