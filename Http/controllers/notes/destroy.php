<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$user_id_curent = 3;

$note = $db->query("SELECT * FROM POST WHERE id = :id", [
    "id" => $id
])->findOrFail();

authorize($note["user_id"] === $user_id_curent);

$db->query("DELETE FROM post WHERE id = :id", [
    "id" => $id
]);

header("location: /notes");
exit();
