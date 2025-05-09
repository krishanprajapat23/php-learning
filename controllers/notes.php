<?php

$config = require('config.php');

$db = new Database($config['database']);

$query = "SELECT * FROM notes WHERE user_id = 1";
// $params = [':id' => $id];

$notes = $db->query($query)->fetchAll();

// dd($notes);


require "views/notes.view.php";