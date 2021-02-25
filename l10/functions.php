<?php

function test()
{
//    echo __FUNCTION__, PHP_EOL;
    echo 'Random number is: ' . mt_rand() . PHP_EOL;
}
test();

$anonimous = function () {
    echo 'Random number is: ' . mt_rand() . PHP_EOL;
};
var_dump($anonimous);

$array = [1, 2, 4, 5, 6, 7, 8, 23];
$array = array_filter($array, function ($value) {
    return $value % 2 === 0;
});
var_dump($array);
