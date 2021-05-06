<?php

namespace helpers;

class ArraysHelper
{
    public static function find(
        array $data,
        string $key,
        mixed $default = null,
        string $delimiter = '.'
    ): mixed {
        $parts = explode($delimiter, $key);
        foreach ($parts as $part) {
            if (array_key_exists($part, $data)) {
                $data = $data[$part];
            } else {
                return $default;
            }
        }

        return $data;
    }
}