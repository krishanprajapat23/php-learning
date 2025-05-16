<?php
use Http\Form\LoginForm;
use Core\Authenticator;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

$formValidate = $form->validate($email, $password);

// if form did not validate 
if ($formValidate) {
    // if form validate then check the auth in db
    $auth = new Authenticator();
    // if user found in db
    if($auth->attempt($email, $password)) {
        // then redirect to the dashboard 
        redirect('./');
    }
    
    $form->setErrors('password', 'No matching account found for that email address and password.');
}

return view("session/create.view.php", [
    "errors" => $form->getErrors(),
]);