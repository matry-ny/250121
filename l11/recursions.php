<?php

//while (true) {
//    echo mt_rand() . ' >> ' . memory_get_usage() . ' bytes used', PHP_EOL;
//    sleep(1);
//}

//function rec()
//{
//    echo mt_rand() . ' >> ' . memory_get_peak_usage() . ' bytes used', PHP_EOL;
//    sleep(1);
//
//    rec();
//}
//
//rec();

function power(int $number, int $power)
{
    echo memory_get_usage(), PHP_EOL;
    echo "{$number} ^ {$power} = ?", PHP_EOL;
    if ($power === 1) {
        echo "{$number} ^ {$power} = {$number}", PHP_EOL;
        return $number;
    }

    $result = $number * power($number, $power - 1);
    echo "{$number} ^ {$power} = {$result}", PHP_EOL;

    return $result;
}

//$power = power(3, 10);
//
//var_dump($power);

/*
 * 3 ^ 3 = 3 * (3 ^ 2)
 * 3 ^ 2 = 3 * (3 ^ 1)
 * 3 ^ 1 = 3
 */

$counter = 0;

function fibonacci(int $n)
{
    static $storage = [];
    global $counter;
    $counter++;

    echo "{$counter}: {$n}", PHP_EOL;

    if ($n === 0) {
        return 0;
    }

    if ($n === 1) {
        return 1;
    }

    if (array_key_exists($n, $storage)) {
        return $storage[$n];
    }

    $result = fibonacci($n - 1) + fibonacci($n - 2);

    $storage[$n] = $result;

    return $result;
}

/*
 *                                        5
 *                                      4 + ?3
 *                               3 + ?2
 *                      2 + 1            1 + 0
 *              1 + 0 = 1
 *
 *
 * 5
 * 4
 * 3
 * 2
 * 1
 * 0
 * 1
 * 2
 * 1
 */


/*
 * 0 1 2 3 5 13
 */

$number = fibonacci(200);
var_dump($number, $counter);


// 12
$array = [
    1,
    2,
    3,
    'test' => [
        3,
        0,
        5 => [
            'test',
            'ttt',
            23 => [
                1,
                2,
            ]
        ]
    ]
];

function countRecursive($array)
{
    $count = 0;
    foreach ($array as $value) {
        $count++;
        if (is_array($value)) {
            $preCount = $count;
//            echo $count, PHP_EOL;
            $recursionCount = countRecursive($value);
            $count += $recursionCount;
            echo "{$preCount} + {$recursionCount} = {$count}", PHP_EOL;
        }
    }

    return $count;
}

var_dump(countRecursive($array));
