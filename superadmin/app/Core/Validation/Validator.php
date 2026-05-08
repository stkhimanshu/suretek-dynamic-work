<?php

namespace App\Core\Validation;

class Validator
{
    private array $errors = [];

    public function validate(
        array $data,
        array $rules
    ): bool {

        foreach ($rules as $field => $ruleString) {

            $rulesArray = explode('|', $ruleString);

            foreach ($rulesArray as $rule) {

                $this->applyRule(
                    $field,
                    $data,
                    $rule
                );
            }
        }

        return empty($this->errors);
    }

    private function applyRule(
        string $field,
        array $data,
        string $rule
    ): void {

        if ($rule === 'required') {

            if (
                !isset($data[$field]) ||
                trim((string)$data[$field]) === ''
            ) {
                $this->addError(
                    $field,
                    "{$field} is required"
                );
            }
        }

        if ($rule === 'email') {

            if (
                isset($data[$field]) &&
                !filter_var(
                    $data[$field],
                    FILTER_VALIDATE_EMAIL
                )
            ) {
                $this->addError(
                    $field,
                    "{$field} must be valid"
                );
            }
        }

        if (str_starts_with($rule, 'min:')) {

            $min = (int) str_replace(
                'min:',
                '',
                $rule
            );

            if (
                isset($data[$field]) &&
                strlen((string)$data[$field]) < $min
            ) {
                $this->addError(
                    $field,
                    "{$field} minimum length is {$min}"
                );
            }
        }

        if (str_starts_with($rule, 'max:')) {

            $max = (int) str_replace(
                'max:',
                '',
                $rule
            );

            if (
                isset($data[$field]) &&
                strlen((string)$data[$field]) > $max
            ) {
                $this->addError(
                    $field,
                    "{$field} maximum length is {$max}"
                );
            }
        }
    }

    private function addError(
        string $field,
        string $message
    ): void {

        $this->errors[$field][] = $message;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
