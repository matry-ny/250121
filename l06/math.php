<?php

echo 1 + 2, PHP_EOL;
echo 1 * 2, PHP_EOL;
echo 1 - 2, PHP_EOL;
echo 1 / 2, PHP_EOL;
echo 543 * 0.2, PHP_EOL; // 20%

echo 3 % 2, PHP_EOL;
echo 3 % 5, PHP_EOL;
echo 8 % 3, PHP_EOL;

echo 3 ** 2, PHP_EOL;
echo 3 ** 5, PHP_EOL;

$result = 0;
$result += 2;
$result += 5;
$result *= 2;
$result /= 5;
echo $result, PHP_EOL;

$number = 5;
$number++;
$number++;
$number--;
$number--;
echo $number, PHP_EOL;

$number2 = 5;
echo $number2++ + ++$number2, PHP_EOL;

