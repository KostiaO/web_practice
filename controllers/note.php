<?php
$heading = "Notes";

$config = require("config.php");

$db = new Database($config["database"]);

$id = $_GET['id'];

$notes = $db->query("SELECT * FROM POST WHERE id = :id", compact("id"))->fetchAll();

require "views/notes.view.php";

// https://laracasts.com/series/php-for-beginners-2023-edition/episodes/23