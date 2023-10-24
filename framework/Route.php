<?php

namespace Framework;

class Route
{
    private static array $routes = [];

    public static function set($url, $dataAction, $method): void
    {
        self::$routes[] = [
            "url" => $url,
            "controller" => $dataAction['controller'],
            "method" => $dataAction['method'],
            "REQUEST_METHOD" => $method,
        ];

        self::start();
    }

    public static function start(): void
    {
        foreach (self::$routes as $route) {
            if ($_SERVER['REQUEST_METHOD'] === $route['REQUEST_METHOD']) {
                $controller = $route['controller'];
                $method = $route['method'];
                if ($_SERVER['REQUEST_URI'] == $route['url']) {
                    $controller->$method();
                    die();
                }
            }
        }
    }
}
