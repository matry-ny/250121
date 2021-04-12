<?php

class StringHelper
{
    public static function camelize(string $data): string
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $data)));
    }
}
