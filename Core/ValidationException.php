<?php

namespace Core;

class ValidationException extends \Exception {
    protected $errors = [];
    protected $old = [];

    public static function throw($errors, $old) {
        //create the instance of the class validationexception
        $instance = new static;

        // set the passed errors to the validationexaception errors array
        $instance->errors = $errors;
        
        // set the passed old form data to the validationexaception old array
        $instance->old = $old;

        throw $instance;

    }
    
    public function getErrors() {
        return $this->errors;
    }

    public function getOld() {
        return $this->old;
    }
}