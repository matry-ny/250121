<?php

require_once __DIR__ . '/Autoloader.php';
spl_autoload_register('Autoloader::load');

use models\User;
use components\Application;
use components\web\Request as WebRequest;
use components\cli\Request as CliRequest;

$user = new User();
//$webRequest = new WebRequest();
//$cliRequest = new CliRequest();

$request = php_sapi_name() === 'cli' ? new CliRequest() : new WebRequest();
$app = new Application($request);

$app->test($user);
$app->test($request);

$user->sale();

//var_dump($user, $webRequest, $cliRequest, $app);

//$webRequest->parse();
//$cliRequest->parse();
