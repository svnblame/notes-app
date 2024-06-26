<?php

namespace KTS\src\Core;

class Validator {
    public static function string(mixed $value, int $min = 1, int $max = INF): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
