<?php

$uri = $_SERVER['REQUEST_URI'];

$parsed_uri = parse_url($uri)['path'];

$routes = [
    "/" => "controllers/index.php",
    "/about" => "controllers/about.php",
    "/contact" => "controllers/contact.php",
    "/notes" => "controllers/notes.php",
    "/note" => "controllers/note.php"
];

function abort($status_code = 404) {
    http_response_code($status_code);

    require "views/{$status_code}.php";

    die();
}

if (array_key_exists($parsed_uri, $routes)) {
    require $routes[$parsed_uri];
} else {
    abort();
}
