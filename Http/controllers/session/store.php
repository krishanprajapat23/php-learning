<?php

use Core\App;
use Core\Database;
use Http\Form\LoginForm;

$db = App::resolve(Database::class);

$form = new LoginForm();

$email = $_POST['email'];
$password = $_POST['password'];

$formValidate = $form->validate($email, $password);

// if form did not validate 
if (!$formValidate) {
    return view("session/create.view.php", [
        "errors" => $form->getErrors(),
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