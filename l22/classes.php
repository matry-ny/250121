<?php

declare(strict_types=1);

require_once __DIR__ . '/User.php';
require_once __DIR__ . '/VipUser.php';

var_dump(User::TYPE);

$user = new User();
$user
    ->setName('Dmytro Kotenko')
    ->setAge(32)
    ->setGender('male');
//$user->gender = 'female';

//var_dump($user, $user->name, $user->age);

$user2 = new User();
$user2
    ->setName('Jane Hanson')
    ->setAge(22)
    ->setGender('female');

//var_dump($user, $user2);
//$user->printInfo();
//$user2->printInfo();

$vipUser = new VipUser();
$vipUser
    ->setName('Vasya')
    ->setAge(55)
    ->setGender('male');

var_dump($user, $vipUser);
$vipUser->printInfo();

var_dump($user->getName());

$vipUser->makeCoffee();
$user->makeCoffee();

