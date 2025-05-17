<?php

namespace Http\Form;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct(public array $attr) {

        if (!Validator::email($attr['email'])) {
            $this->errors['email'] = 'Please enter a valid email address.';
        }

        if (!Validator::password($attr['password'])) {
            $this->errors['password'] = "Please enter a valid password.";
        }
    }

    public static function validate($attr) {
        // instance the class LoginForm
        $instance = new static($attr);
        
        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw() {
        ValidationException::throw($this->getErrors(), $this->attr);
    }

    public function failed() {
        return count($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function setErrors($field, $message) {
        $this->errors[$field] = $message;

        return $this;
    }
}