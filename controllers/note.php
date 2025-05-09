<?php

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'] ?? null;
$userId = 1;

$query = "SELECT * FROM notes WHERE id = :id AND user_id = :user_id";
$params = [
    ':id' => $id,
    ':user_id' => $userId  // must be set in your PHP code
];

// $params = [':id' => $id];

$note = $db->query($query, $params)->fetch();

// dd($note['title']);


require "views/note.view.php";