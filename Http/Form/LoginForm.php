<?php

namespace Http\Form;
use Core\Validator;

class LoginForm {
    protected $errors = [];
    public function validate($email, $password) {
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!Validator::password($password)) {
            $this->errors['password'] = "Please enter a valid password.";
        }

        // send the bool value
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function setErrors($field, $message) {
        $this->errors[$field] = $message;
    }
}