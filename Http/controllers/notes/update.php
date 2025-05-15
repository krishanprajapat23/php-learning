<?php

use Core\App;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];

$currentUserId = 1;

$errors = [];


// find the corresponding note in DB
$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    'id' => $id
])->findOrFail();
    
    
//authorize the current user
authorize($note['user_id'] === $currentUserId);


// validate the form

if (!Validator::str($title, 1, 100)) {
    $errors['title'] = 'A Note Title of no more than 100 characters is required.';
}

if (!Validator::str($body, 1, 100)) {
    $errors['body'] = 'A Note Description of no more than 100 characters is required.';
}


// if validation fails then redirect to the edit page again
if (!empty($errors)) {
    return view("notes/edit.view.php", [
        "errors" => $errors,
        "note" => $note,
    ]);
}


// if no validation error, update the note record in DB

$query = "UPDATE notes SET title = :title, body = :body WHERE id = :id";


$params = [
    ':title' => $title,
    ':body' => $body,
    ':id' => $id,
];

$db->query($query, $params);

header('location: ./notes');
die();
