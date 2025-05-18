<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$id = $_GET['id'] ?? null;

$currentUserId = userId();

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    ':id' => $id
])->findOrFail();


authorize($note['user_id'] === $currentUserId);



view("notes/edit.view.php", [
    "errors" => $errors,
    "note" => $note,
]);