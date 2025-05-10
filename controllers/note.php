<?php

$config = require('config.php');

$db = new Database($config['database']);

$id = $_GET['id'] ?? null;

$currentUserId = 1;

$query = "SELECT * FROM notes WHERE id = :id";
$params = [
    ':id' => $id
];

// $params = [':id' => $id];

$note = $db->query($query, $params)->fetch();

if(!$note) {
    abort();
};

if($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

// dd($note);

// dd($note['title']);


require "views/note.view.php";