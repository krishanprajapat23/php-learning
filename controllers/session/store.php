<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$email = $_POST['email'];
$password = $_POST['password'];


if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::password($password, 6, 100)) {
    $errors['password'] = "Please enter a valid password.";
}

if (!empty($errors)) {
    return view("session/create.view.php", [
        "errors" => $errors,
    ]);
}

$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();


// if email is found in db
if($user) {
    if(password_verify($password, $user['password'])) {
        login($user);

        // then redirect to the dashboard 
        header('location: ./');
        exit();
    }
}

// if user email not found in db

return view('session/create.view.php', [
    'errors' => [
        'password' => 'No matching account found for that email address and password.'
    ]]
);