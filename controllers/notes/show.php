<?php
use Core\Database;
use Core\App;

$db = App::resolve(Database::class);


$heading = "Notes";

$id = $_GET['id'];

$user_id_curent = 3;

$note = $db->query("SELECT * FROM POST WHERE id = :id", [
    "id" => $id
])->findOrFail();

authorize($note["user_id"] === $user_id_curent);

view("notes/show.view.php", compact("heading", "note"));
