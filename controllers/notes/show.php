<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$id = $_GET['id'];

$currentUserId = 1;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //if Post req then delete process called 

    //get the current note by id 
    $query = "SELECT * FROM notes WHERE id = :id";
    $params = [
        ':id' => $id
    ];
    
    $note = $db->query($query, $params)->findOrFail();
    
    // authorize user if current user sent the post req method
    authorize($note['user_id'] === $currentUserId);

    // then delete after auth the current note
    $db->query("DELETE FROM notes WHERE id = :id", [
        'id' => $id,
    ]);

    //after deletion redirect the page to the notes page
    header('location: ./notes');
    exit();


} else {
    $query = "SELECT * FROM notes WHERE id = :id";
    $params = [
        ':id' => $id
    ];
    
    
    $note = $db->query($query, $params)->findOrFail();
    
    
    authorize($note['user_id'] === $currentUserId);
    
    
    view("notes/show.view.php", [
        "note" => $note,
    ]);

}
