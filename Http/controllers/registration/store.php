<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_pw = $_POST['confirm_password'];

// dd($_POST);

if (!Validator::str($name, 2, 255)) {
    $errors['name'] = 'A name of more than 2 characters is required.';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::password($password, 6, 100)) {
    $errors['password'] = "Password must be between 6-100 characters and include at least one letter, one number, and one special character.";
}

if (!Validator::match($password, $confirm_pw)) {
    $errors['password'] = "Password didn't matched.";
}


// if user exist already with given email id
$user = $db->query("SELECT id FROM users WHERE email = :email LIMIT 1" , [
    ':email' => $email
])->find();

if ($user) {
    $errors['email'] = "This email is already registered.";
}


if (!empty($errors)) {
    return view("registration/create.view.php", [
        "errors" => $errors,
    ]);
}

// if there is no error which means the user is not already exist and we can proceed with the new user

$query = "INSERT INTO users (name, email, password, created_on) VALUES (:name, :email, :password, now())";

$db->query($query, [
    ':name' => $name,
    ':email' => $email,
    ':password' => password_hash($password, PASSWORD_BCRYPT), // password hashing
]);

// logged in
(new Authenticator)->login(['email' => $email]);

redirect('./dashboard');