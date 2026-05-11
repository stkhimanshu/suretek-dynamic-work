<?php

namespace App\Modules\Category\Validators;

use App\Core\Validation\Validator;

class CategoryValidator
{
    public static function validateCreate(
        array $data
    ): array {

        $validator = new Validator();

        $valid = $validator->validate($data, [
            'title' => 'required|min:2|max:191',
            'type' => 'required|min:2|max:100',
        ]);

        return [
            'valid' => $valid,
            'errors' => $validator->errors(),
        ];
    }

    public static function validateUpdate(
        array $data
    ): array {
        return self::validateCreate($data);
    }

    public static function validateUpdateStatus(
        array $data
    ): array {
        $validator = new Validator();

        $valid = $validator->validate($data, [
            'status' => 'required',
        ]);

        return [
            'valid' => $valid,
            'errors' => $validator->errors(),
        ];
    }
}
