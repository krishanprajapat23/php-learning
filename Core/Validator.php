<?php

namespace Core;

class Validator {
    // pure function can be static can be called like
    // Class::fn($params);

    // Validate string length between min and max (inclusive)
    public static function str($value, $min = 1, $max = INF) {
        $value = trim($value);

        return strlen($value) > $min && strlen($value) <= $max;
    }

    // Validate email format
    public static function email($value): bool {
        $value = trim($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Check if two values match exactly
    public static function match($value1, $value2): bool {
        return $value1 === $value2;
    }

    // Validate password strength: letter, number, special char, and length
    public static function password($value, $min = 6, $max = 100): bool {
        $value = trim($value);
        $pw_len = strlen($value);

        if ($pw_len < $min || $pw_len > $max) {
            return false;
        }

        $hasLetter = preg_match('/[a-zA-Z]/', $value);
        $hasNumber = preg_match('/[0-9]/', $value);
        $hasSpecial = preg_match('/[^a-zA-Z0-9]/', $value);

        return $hasLetter && $hasNumber && $hasSpecial;
    }

    
}