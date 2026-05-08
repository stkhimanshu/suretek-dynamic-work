<?php

namespace App\Core\Routing;

use App\Core\Http\Request;
use App\Core\Http\Response;

class Router
{
    private static array $routes = [];

    public static function get(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::$routes['GET'][$uri] = [
            'action' => $action,
            'middlewares' => $middlewares,
        ];
    }

    public static function post(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::$routes['POST'][$uri] = [
            'action' => $action,
            'middlewares' => $middlewares,
        ];
    }

    public static function dispatch(): void
    {
        $method = Request::method();

        $uri = Request::uri();

        $route = self::$routes[$method][$uri] ?? null;

        if (!$route) {

            Response::error(
                'Route not found',
                404
            );
        }

        foreach (
            $route['middlewares']
            as $middleware
        ) {

            $middleware::handle();
        }

        [$class, $methodName] = $route['action'];

        $controller = new $class();

        call_user_func([
            $controller,
            $methodName
        ]);
    }
}
