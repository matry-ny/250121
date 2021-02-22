<?php

$eol = PHP_SAPI === 'cli' ? PHP_EOL : '<br>';

for ($i = 0; $i < 5; $i++) {
    echo $i, $eol;
}

echo $eol;

/*
$rand = 0;
for ( ; $rand !== 3; ) {
    $rand = random_int(1, 5);
    echo $rand, $eol;

//    if ($rand === 3) {
//        break;
//    }
    sleep(1);
}
*/

echo $eol;

$array = [
    0 => 'test',
    1 => 'qwerty',
    2 => '1234567'
];

$count = count($array);
for ($i = 0; $i < $count; $i++) {
    echo $array[$i], $eol;
}

echo $eol;

$handle = fopen(__DIR__ . '/multiply_table.php', 'rb');
while ($line = fgets($handle)) {
    echo $line;
}
fclose($handle);

echo $eol;

$arrayWhile = $array;
while($arrayWhile) {
    echo array_shift($arrayWhile), $eol;
}

echo $eol;

$data = [1, 2, 3, 6, 8, 9];
do {
    $number = random_int(1, 10);
    echo $number, $eol;
} while (in_array($number, $data));

echo $eol;

$bigArray = [];
for ($i = 0; $i < 500; $i++) {
    $bigArray[] = mt_rand();
}

foreach ($bigArray as $index => $data) {
    if ($index % 9 !== 0) {
        continue;
    }

    echo "[{$index}] = {$data}{$eol}";
}

echo $eol;

foreach ($array as &$value) {
    $value .= ' [OK]';
}
unset($value);

var_dump($array);

// Homework
// $menu = [
//      ...
//      ... => [
//          ...
//          ...
//          ...
//      ]
//      ...
//      ...
// ]
//
// LOOP { ... }
//
// <ul>
//      <li><a href="/link1">Text 1</a></li>
//      <li><a href="/link2">Text 2</a></li>
//      <li>
//          Text 3
//          <ul>
//              <li><a href="/link3_1">Text 3.1</a></li>
//              <li><a href="/link3_2">Text 3.2</a></li>
//          </ul>
//      </li>
// </ul>