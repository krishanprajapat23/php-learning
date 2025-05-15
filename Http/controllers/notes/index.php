<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = "SELECT * FROM notes WHERE user_id = 1";
// $params = [':id' => $id];

$notes = $db->query($query)->get();

// dd($notes);


view("notes/index.view.php", [
    "notes" => $notes,
]);