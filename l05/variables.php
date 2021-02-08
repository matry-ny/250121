<?php

$fruit = 'Orange';

echo $fruit, PHP_EOL;
echo $fruit, PHP_EOL;

$fruit = 'Apple';
echo $fruit, PHP_EOL;
echo $fruit, PHP_EOL;

// FAILS
// test = 123; $ is required
// $1test = 123; no numbers on start
// $te^st = 123; no special characters
// $te st = 123; no spaces

// AVAILABLE
$t1weq = 213;
$_te_st = 123;

$all_students_list = [];

$allStudentsList = [];
$minSum = 12;

$test = 'TEST';
$link = &$test;

var_dump($test, $link);

$test = 123;
//$link = 22222;

var_dump($test, $link);

$var1 = 'qwerty';
$qwerty = 'test123';
$$var1 = 11155;

var_dump($qwerty, $qwerty * 2);
