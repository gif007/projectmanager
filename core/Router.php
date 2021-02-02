<?php

namespace App\Core;

class Router {

    public $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        foreach (array_keys($this->routes[$requestType]) as $route) {
            if (preg_match($route, $uri)) {
                return $this->callAction(...explode('@', $this->routes[$requestType][$route]));
            }
        }

        throw new Exception('No routes defined for this URI');
    }

    protected function callAction($controller, $action) {
        $controller = "App\\Controllers\\$controller";
        $controller = new $controller;
        if (! method_exists($controller, $action)) {
            throw new Exception(
                "{%controller} does not respond to {$action} action."
            );
        }

        return $controller->$action();
    }
}