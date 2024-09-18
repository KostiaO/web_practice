<?php

namespace Core;

use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    private function add($method, $uri, $controller) {
        $middleware = null;

        $this->routes[] = compact("uri", "controller", "method", "middleware");

        return $this;
    }

    public function get($uri, $controller) {
        return $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller) {
        return $this->add("DELETE", $uri, $controller);
    }

    public function put($uri, $controller) {
        return $this->add("PUT", $uri, $controller);
    }

    public function patch($uri, $controller) {
        return $this->add("PATCH", $uri, $controller);
    }

    public function route($uri, $method = "GET") {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                Middleware::resolve($route["middleware"]);

                return require base_path($route["controller"]);
            }
        }

        $this->abort();
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;

        return $this;
    }

    protected function abort($status_code = Response::NOT_FOUND) {
        http_response_code($status_code);
    
        require base_path("views/{$status_code}.php");
    
        die();
    }
}
