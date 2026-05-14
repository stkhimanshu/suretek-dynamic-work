<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/config/global-variables.php';

$requestUri = $_SERVER['REQUEST_URI'];

$requestUri = strtok($requestUri, '?');

$basePath = ADMIN_PATH . '/public';

if (strpos($requestUri, $basePath) === 0) {
    $requestUri = substr($requestUri, strlen($basePath));
}

$requestUri = $requestUri ?: '/';

$_SERVER['REQUEST_URI'] = $requestUri;

require_once dirname(__DIR__) . '/bootstrap/init.php';

require_once dirname(__DIR__) . '/routes/api.php';

use App\Core\Middleware\CorsMiddleware;
use App\Core\Routing\Router;

CorsMiddleware::handle();

Router::dispatch();
