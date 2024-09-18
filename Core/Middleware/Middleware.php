<?php

namespace Core\Middleware;

class Middleware {
    private const MAP = [
        "guest" => Guest::class,
        "auth" => Auth::class
    ];

    public static function resolve($key) {
        if (!$key) {
            return;
        }

        $middlewareHandler = self::MAP[$key];

        if (!isset($middlewareHandler)) {
            throw new \Exception("Es gibt keine middleware handler associated mit diesem key: " . $key);
        }

        (new $middlewareHandler)->handle();
    }
}
