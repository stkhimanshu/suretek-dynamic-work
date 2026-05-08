<?php

namespace App\Core\Exceptions;

use Throwable;

class AppExceptionHandler
{
    public static function handle(
        Throwable $exception
    ): void {

        $statusCode = 500;

        $response = [
            'success' => false,
            'message' => 'Internal server error',
        ];

        if ($exception instanceof ApiException) {

            $statusCode = $exception->getStatusCode();

            $response['message'] = $exception->getMessage();

            if (!empty($exception->getErrors())) {

                $response['errors'] = $exception->getErrors();
            }
        } else {

            $response['message'] = $exception->getMessage();
        }

        http_response_code($statusCode);

        header('Content-Type: application/json');

        echo json_encode(
            $response,
            JSON_PRETTY_PRINT
        );

        exit;
    }

    // public static function handle(
    //     \Throwable $exception
    // ): void {

    //     echo '<pre>';

    //     print_r([
    //         'message' => $exception->getMessage(),
    //         'file' => $exception->getFile(),
    //         'line' => $exception->getLine(),
    //         'trace' => $exception->getTraceAsString(),
    //     ]);

    //     die;
    // }
}
