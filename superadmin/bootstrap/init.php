<?php

declare(strict_types=1);

use App\Core\Exceptions\AppExceptionHandler;
use App\Core\Helpers\Env;

session_start();

spl_autoload_register(function ($class) {

    $class = str_replace('App\\', '', $class);

    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($path)) {
        require_once $path;
    }
});

$envPath = __DIR__ . '/../.env';

if (file_exists($envPath)) {

    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {

        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        [$key, $value] = explode('=', $line, 2);

        $_ENV[trim($key)] = trim($value);
    }
}

set_exception_handler([
    AppExceptionHandler::class,
    'handle'
]);

Env::load(
    dirname(__DIR__) . '/.env'
);
