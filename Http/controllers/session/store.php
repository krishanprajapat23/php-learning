<?php
use Http\Form\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];


// check if form is validate 
$form = LoginForm::validate($attr = [
    'email'=> $email,
    'password'=> $password,
]);

// if form validate then check the auth in db
$auth = new Authenticator();
$signIn = $auth->attempt($attr['email'], $attr['password']);

// if user credentials wrong... then throw the error and redirect to the prevUrl
if(!$signIn) {
    $form->setErrors('password', 'No matching account found for that email address and password.')->throw();
}

// else redirect to the dashboard 
redirect('./dashboard');
