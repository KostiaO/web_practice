<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = "Notes";

$errors = [];

if (!Validator::string($_POST["title"], 1, 10)) {
    $errors["title"] = "A body is required";
}

if (empty($errors)) {
    $db->query("INSERT INTO post(title, user_id) VALUES(:title, :user_id)", [
        "user_id" => 3,
        "title" => $_POST["title"]
    ]);

    header("location: /notes");
} else {
    view("notes/create.view.php", compact("heading", "errors"));
}


