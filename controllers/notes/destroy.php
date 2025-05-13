<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

//get the current note by id 
$query = "SELECT * FROM notes WHERE id = :id";
$params = [
    ':id' => $_POST['id']
];

$note = $db->query($query, $params)->findOrFail();

// authorize user if current user sent the post req method
authorize($note['user_id'] === $currentUserId);

// then delete after auth the current note
$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $_POST['id']
]);

//after deletion redirect the page to the notes page
header('location: ./notes');
exit();
