<?php

use App\Core\Routing\Router;
use App\Modules\User\Controllers\AuthController;
use App\Modules\User\Controllers\UserController;
use App\Modules\System\Controllers\HealthController;
use App\Modules\System\Controllers\DatabaseHealthController;
use App\Modules\Category\Controllers\CategoryController;
use App\Core\Middleware\AuthMiddleware;

Router::post('/api/v1/auth/login', [
    AuthController::class,
    'login'
]);

Router::post(
    '/api/v1/users',
    [
        UserController::class,
        'create'
    ],
    [
        AuthMiddleware::class
    ]
);

Router::get('/api/v1/health', [
    HealthController::class,
    'index'
]);

Router::get('/api/v1/db-health', [
    DatabaseHealthController::class,
    'index'
]);

// Category
Router::get(
    '/api/v1/categories',
    [CategoryController::class, 'index']
);

Router::post(
    '/api/v1/categories',
    [CategoryController::class, 'store']
);

Router::put(
    '/api/v1/categories/{id}',
    [CategoryController::class, 'update']
);

Router::delete(
    '/api/v1/categories/{id}',
    [CategoryController::class, 'delete']
);

Router::patch(
    '/api/v1/categories/{id}/status',
    [CategoryController::class, 'updateStatus']
);
