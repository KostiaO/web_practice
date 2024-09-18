<?php
use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    exit();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort($status);
    }
}

function abort($status_code = Response::NOT_FOUND) {
    http_response_code($status_code);

    require base_path("views/{$status_code}.php");

    die();
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path('views/' . $path);
}

function login($user) {
    $_SESSION["user"] = [
        "email" => $user["email"]
    ];

    session_regenerate_id();
}

function logout() {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();

    setcookie("PHPSESSID", '', time() - 3600, $params["path"], $params["domain"]);
}
