<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = userId();

$query = "SELECT * FROM notes WHERE user_id = :id";
$params = [':id' => $currentUserId];

$notes = $db->query($query, $params)->get();

// dd($notes);


view("notes/index.view.php", [
    "notes" => $notes,
]);