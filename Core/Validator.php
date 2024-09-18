<?php
namespace Core;

class Validator {
    public static function string($value, $min = 1, $max = INF) {
        $value_len = strlen(trim($value));

        return $value_len >= $min && $value_len <= $max;
    }
}
