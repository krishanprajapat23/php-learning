<?php

namespace Core;

class Validator {
    // pure function can be static can be called like
    // Class::fn($params);
    public static function str($value, $min = 1, $max = INF) {
        $value = trim($value);

        return strlen($value) > $min && strlen($value) <= $max;
    }

    
}