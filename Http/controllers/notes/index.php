<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$heading = "Notes";

$notes = $db->query("SELECT * FROM POST")->get();

view("notes/index.view.php", compact("heading", "notes"));
