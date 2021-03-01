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

//var_dump(random_int(1, 4));

function sayHello(string $name, int $age, string $gender, string $suffix = '!', string ...$spells)
{
    echo "Hello, dear {$name}, {$gender}, {$age} years old{$suffix}<br>";
    var_dump($spells);
}

sayHello('Dmytro', 22, 'male');
sayHello('Harry', 34, 'male', '?! WTF !?', 'Patronus');
sayHello('Germiona', 25, 'female', '!', 'Awada cedawra', 'Alohomora');

sayHello(age: 12, name: 'Draco', suffix: '???', gender: 'male');

//sayHello('Fail', 'make', 33);

function intSum(int ...$ints): void
{
//    $ints = func_get_args();
    echo array_sum($ints), '<br>';
}

intSum(1, 2, 4, 6, 7);


function game(int $number): bool
{
    return $number === random_int(1, 10);
}

$isWinner = game(5);

var_dump($isWinner);

$data = 123;

//function hiding(&$insideData)
function hiding($insideData)
{
    $insideData = 8888;
    var_dump($insideData);
    return $insideData;
}

$data = hiding($data);

var_dump($data);

function globals()
{
//    var_dump($GLOBALS['data']);

    global $data;
    $myData = $data;
    $myData = 333;
    var_dump($myData);

    unset($data);
    unset($GLOBALS['data']);

//    var_dump($data);
}

globals();

var_dump($data);
