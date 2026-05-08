<?php

namespace App\Modules\User\Validators;

use App\Core\Validation\Validator;

class UserValidator
{
    public static function validateCreate(
        array $data
    ): array {

        $validator = new Validator();

        $valid = $validator->validate($data, [

            'first_name' => 'required|min:2|max:100',

            'email' => 'required|email|max:191',

            'username' => 'required|min:3|max:100',

            'password' => 'required|min:8|max:100',
        ]);

        return [
            'valid' => $valid,
            'errors' => $validator->errors(),
        ];
    }
}
