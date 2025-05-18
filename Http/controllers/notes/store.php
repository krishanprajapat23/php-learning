<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Authenticator;

$db = App::resolve(Database::class);

$currentUserId = userId();

$errors = [];

$title = $_POST['title'];
$body = $_POST['body'];



if (!Validator::str($title, 1, 100)) {
    $errors['title'] = 'A Note Title of no more than 100 characters is required.';
}

if (!Validator::str($body, 1, 100)) {
    $errors['body'] = 'A Note Description of no more than 100 characters is required.';
}


if (!empty($errors)) {
   return view("notes/create.view.php", [
        "errors" => $errors,
    ]);
}

$query = "INSERT INTO `notes` (`title`, `body`, `created_on`, `user_id`) VALUES (:title, :body, now(), :user_id)";

$params = [
    ':title' => $title,
    ':body' => $body,
    'user_id' => $currentUserId,
];

$db->query($query, $params);

header('location: ./notes');
exit();
