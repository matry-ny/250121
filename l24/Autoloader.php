<?php

class Autoloader
{
    public static function load(string $class): void
    {
        $rout = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        if (!file_exists($rout)) {
            throw new Exception("Class {$class} can not be loaded");
        }

        require_once $rout;
    }
}
