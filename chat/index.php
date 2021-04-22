<?php

require_once __DIR__ . '/components/Autoloader.php';
$autoloader = new \components\Autoloader(__DIR__);
spl_autoload_register([$autoloader, 'load']);

$config = require __DIR__ . '/configs/main.php';

$result = \components\App::init($config)->run();
echo $result;
