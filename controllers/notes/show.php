<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

$currentUserId = 1;

$query = "SELECT * FROM notes WHERE id = :id";
$params = [
    ':id' => $id
];

// $params = [':id' => $id];

$note = $db->query($query, $params)->findOrFail();


authorize($note['user_id'] === $currentUserId);

// dd($note);

// dd($note['title']);


view("notes/show.view.php", [
    "note" => $note,
]);