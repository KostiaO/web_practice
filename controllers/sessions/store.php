<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];
if (!Validator::string($email)) {
    $errors["email"] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 4, 10)) {
    $errors["password"] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    return view('sessions/create.view.php', [
        "errors" => $errors
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    "email" => $email
])->find();

if (! $user) {
    return view('sessions/create.view.php', [
        "errors" => [
            "email" => "No matching account found to this e-mail address"
        ]
    ]);
}

if (password_verify($password, $user["password"])) {
    login([
        "email" => $email
    ]);

    header("location: /");
    exit();
}

return view('sessions/create.view.php', [
    "errors" => [
        "password" => "Password doesnt match"
    ]
]);
