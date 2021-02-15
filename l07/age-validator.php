<?php

$age = readline('Enter your age: ');

if (!is_numeric($age)) {
    exit('Data is incorrect' . PHP_EOL);
}

$age = (int)$age;

if ($age >= 18 && $age < 60) {
    echo 'You are welcome!', PHP_EOL;
} elseif ($age >= 80) {
    echo 'You are too old', PHP_EOL;
} elseif ($age < 10) {
    echo 'You are too young', PHP_EOL;
} else {
    echo 'Access denied!', PHP_EOL;
}

echo  PHP_EOL;

switch ($age) {
    case 33:
        echo 'Age of Jesus', PHP_EOL;
        break;
    case $age >= 18 && $age < 60:
        echo 'You are welcome!', PHP_EOL;
        break;
    case $age >= 80:
        echo 'You are too old', PHP_EOL;
        break;
    case $age < 10:
        echo 'You are too young', PHP_EOL;
        break;
    default:
        echo 'Access denied!', PHP_EOL;
}
