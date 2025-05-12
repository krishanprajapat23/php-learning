<?php

$config = require base_path('config.php');

$db = new Database($config['database']);

$query = "SELECT * FROM notes WHERE user_id = 1";
// $params = [':id' => $id];

$notes = $db->query($query)->get();

// dd($notes);


view("notes/index.view.php", [
    "notes" => $notes,
]);