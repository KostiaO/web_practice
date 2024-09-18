<?php

use Core\Validator;
use Core\Database;
use Core\App;

$email = $_POST["email"];
$password = $_POST["password"];

// validate form inputs
$errors = [];
if (!Validator::string($email)) {
    $errors["email"] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 4, 10)) {
    $errors["password"] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        "errors" => $errors
    ]);
}

$db = App::resolve(Database::class);

// check if the account already exists
$user = $db->query("SELECT * from users WHERE email = :email", [
    "email" => $email
])->find();

// if yes, redirect to login page
if ($user) {
    // then someone with that email already exists and has an account.

    header('location: /');
    exit();
} else {
    // if not, save one to the database, and then log the user in, and redirect.
    $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", 
        [
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT)
        ]);

    login($user);

    header('location: /');
    exit();
}
