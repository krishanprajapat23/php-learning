<?php

require 'Validator.php';

$config = require 'config.php';

$db = new Database($config['database']);


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // dd($_POST);

    // If title and body is set, use their value.
    // If not, use empty string '' instead.

    $title = $_POST['title'];
    $body = $_POST['body'];
    
    $errors = [];
    
    
    if(!Validator::str($title, 1, 100)) {
        $errors['title'] = 'A Note Title of no more than 100 characters is required.';
    }
    
    if(!Validator::str($body, 1, 100)) {
        $errors['body'] = 'A Note Description of no more than 100 characters is required.';
    }
    

    if(empty($errors)) {
     
        $query = "INSERT INTO `notes` (`title`, `body`, `created_on`, `user_id`) VALUES (:title, :body, now(), :user_id)";
        
        $params = [
            ':title' => $title,
            ':body' => $body,
            'user_id' => 1,
        ];

        $db->query($query, $params);
    }

}


require "views/note-create.view.php";