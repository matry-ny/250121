<?php

require_once __DIR__ . '/MyException.php';
require_once __DIR__ . '/StringHelper.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/VipUser.php';
//require_once __DIR__ . '/VeryVipUser.php';

User::$discount = 10.2;
VipUser::$discount = 15;
var_dump(User::$discount, VipUser::$discount);

function getUser()
{
    $rand = random_int(0, 1);
    if ($rand === 1) {
        return new User('Test', 'male');
    }

    return new VipUser('VIP Test', 'female');
}

$randomUser = getUser();
var_dump(get_class($randomUser));
if ($randomUser instanceof VipUser) {
    var_dump('Is VIP');
} else {
    var_dump('Is regular user');
}
unset($randomUser);

$vip = new VipUser('Test Qwerty', 'make', 11);

$vip2 = clone $vip;
$vip2->setName('Some Other VIP');

$vip3 = clone $vip;
$vip3->setAge(22);

var_dump($vip, $vip2, $vip3);

var_dump($vip->toArray());

$user = new User('U01', 'not exists');
try {
    $user->level = 123;
    $user->size = 34;
    $user->friend = 'QQQ Qwerty';
} catch (RuntimeException $exception) {
    var_dump($exception->getMessage());
} catch (MyException $exception) {
    var_dump('My exception: ' . $exception->getMessage());
} catch (Exception $exception) {
    exit($exception->getMessage());
} finally {
    var_dump('Expression is DONE');
}

var_dump($user, $user->size);

var_dump($user->getDiscount(), $vip->getDiscount());

var_dump(StringHelper::camelize('my_test_string_for_camelize'));

var_dump('Objects: ' . User::getCount());

var_dump(User::TYPE, VipUser::TYPE);

var_dump($user->getType(), $vip->getType());

//new VeryVipUser('King Lion', 8);
