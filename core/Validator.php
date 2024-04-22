<?php

//Pure method - tapec static
class Validator {
    static public function string($data, $min = 0, $max = INF) {
        $data = trim($data);

        return is_string($data)
               && strlen($data) >= $min
               && strlen($data) <= $max;
            }

    static public function number($data, $min = 0, $max = INF) {
           $data = trim($data);

        return is_numeric($data)
               && strlen($data) >= $min
               && strlen($data) <= $max;
            }

    static public function email($data) {

        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    public static function password($data) {
        $minLength = 8;

        $uppercaseRegex = '/[A-Z]/';
        $lowercaseRegex = '/[a-z]/';
        $numberRegex = '/[0-9]/';
        $specialCharRegex = '/[!@#$%^&*()-_=+{};:,<.>]/';

        return strlen($data) >= $minLength &&
               preg_match($uppercaseRegex, $data) &&
               preg_match($lowercaseRegex, $data) &&
               preg_match($numberRegex, $data) &&
               preg_match($specialCharRegex, $data);
    }
}