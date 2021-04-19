<?php

namespace helpers;

class StringsHelper
{
    public static function camelize(string $string): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
}
