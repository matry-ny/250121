<?php

require_once __DIR__ . '/components/Autoloader.php';
$autoloader = new \components\Autoloader(__DIR__);
spl_autoload_register([$autoloader, 'load']);

if (php_sapi_name() === 'cli') {
    $dispatcher = new \components\cli\CliDispatcher();
} else {
    $dispatcher = new \components\web\WebDispatcher();
}

$router = new \components\Router($dispatcher);

$router->init();
