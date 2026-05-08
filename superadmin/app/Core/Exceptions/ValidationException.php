<?php

namespace App\Core\Exceptions;

class ValidationException extends ApiException
{
    public function __construct(array $errors)
    {
        parent::__construct(
            'Validation failed',
            422,
            $errors
        );
    }
}
