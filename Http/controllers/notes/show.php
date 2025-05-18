<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$id = $_GET['id'] ?? null;

$currentUserId = userId();


// dd($currentUserId);

$query = "SELECT * FROM notes WHERE id = :id";
$params = [
    ':id' => $id
];


$note = $db->query($query, $params)->findOrFail();


authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php", [
    "note" => $note,
]);
