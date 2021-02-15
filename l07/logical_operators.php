<?php

var_dump(1 == '1');
var_dump(1 != 1);
var_dump('test' == 'qwerty');

echo "1 === '1' >>> ";
var_dump(1 === '1');
echo "1 !== '1' >>> ";
var_dump(1 !== '1');
echo "0 === false >>> ";
var_dump(0 === false);

$more = 1 > 1;
echo "1 > 1 >>> ";
var_dump($more);
var_dump('2020-05-02' > '2020-05-01');
var_dump(1 >= 1);

var_dump(1 < 1);
var_dump('2020-05-02' < '2020-05-01');
var_dump(1 <= 1);

$minSalary = 350;
$maxSalary = 700;
$salary = random_int(300, 1000);

$isFineSalary = $salary >= $minSalary && $salary <= $maxSalary;
var_dump($salary, $isFineSalary);
var_dump($salary, $salary >= $minSalary || $salary <= $maxSalary);

var_dump($salary, $isFineSalary && $salary != 666);
