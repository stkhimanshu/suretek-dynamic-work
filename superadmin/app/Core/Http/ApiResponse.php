<?php

namespace App\Core\Http;

class ApiResponse
{
    private array $response;

    private int $status;

    public function __construct(array $response, int $status)
    {
        $this->response = $response;
        $this->status = $status;
    }

    public function success(): bool
    {
        return (
            $this->status >= 200 &&
            $this->status < 300 &&
            ($this->response['success'] ?? false)
        );
    }

    public function message(): string
    {
        return $this->response['message'] ?? 'Something went wrong';
    }

    public function data(): mixed
    {
        return $this->response['data'] ?? null;
    }

    public function status(): int
    {
        return $this->status;
    }

    public function raw(): array
    {
        return $this->response;
    }
}
