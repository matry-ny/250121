<?php

$age = 33;
if ($age >= 18) {
    echo 'OK';
} else {
    echo 'FAIL';
}
echo PHP_EOL;

if ($age >= 18)
    echo 'OK';
elseif ($age == 33)
    echo 'Very OK';
else
    echo 'FAIL';

echo PHP_EOL;

if ($age >= 18) echo 'OK'; elseif ($age == 33) echo 'Very OK'; else echo 'FAIL';
echo PHP_EOL;

if ($age >= 18):
    echo 'OK';
elseif ($age == 33):
    echo 'Very OK';
else:
    echo 'FAIL';
endif;

echo PHP_EOL;

echo $age >= 18 ? 'OK' : 'FAIL';
echo PHP_EOL;

echo $age == 33 ? 'Jesus' : ($age >= 18 ? 'OK' : 'FAIL');
echo PHP_EOL;
