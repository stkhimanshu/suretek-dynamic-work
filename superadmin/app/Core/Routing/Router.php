<?php

namespace App\Core\Routing;

use App\Core\Http\Request;
use App\Core\Http\Response;

class Router
{
    private static array $routes = [];

    /*
    |--------------------------------------------------------------------------
    | GET
    |--------------------------------------------------------------------------
    */
    public static function get(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::addRoute(
            'GET',
            $uri,
            $action,
            $middlewares
        );
    }

    /*
    |--------------------------------------------------------------------------
    | POST
    |--------------------------------------------------------------------------
    */
    public static function post(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::addRoute(
            'POST',
            $uri,
            $action,
            $middlewares
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PUT
    |--------------------------------------------------------------------------
    */
    public static function put(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::addRoute(
            'PUT',
            $uri,
            $action,
            $middlewares
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PATCH
    |--------------------------------------------------------------------------
    */
    public static function patch(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::addRoute(
            'PATCH',
            $uri,
            $action,
            $middlewares
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public static function delete(
        string $uri,
        array $action,
        array $middlewares = []
    ): void {

        self::addRoute(
            'DELETE',
            $uri,
            $action,
            $middlewares
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Add Route
    |--------------------------------------------------------------------------
    */
    private static function addRoute(
        string $method,
        string $uri,
        array $action,
        array $middlewares
    ): void {

        self::$routes[$method][] = [

            'uri' => $uri,

            'action' => $action,

            'middlewares' => $middlewares,

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Dispatch
    |--------------------------------------------------------------------------
    */
    public static function dispatch(): void
    {
        $method = Request::method();

        $uri = Request::uri();

        $routes = self::$routes[$method] ?? [];

        foreach ($routes as $route) {

            $pattern = preg_replace(
                '#\{([^}]+)\}#',
                '([^/]+)',
                $route['uri']
            );

            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches);

                /*
                |--------------------------------------------------------------------------
                | Middlewares
                |--------------------------------------------------------------------------
                */
                foreach (
                    $route['middlewares']
                    as $middleware
                ) {

                    $middleware::handle();
                }

                /*
                |--------------------------------------------------------------------------
                | Controller
                |--------------------------------------------------------------------------
                */
                [$class, $methodName] = $route['action'];

                $controller = new $class();

                call_user_func_array(
                    [$controller, $methodName],
                    $matches
                );

                return;
            }
        }

        Response::error(
            'Route not found',
            404
        );
    }
}
