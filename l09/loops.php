<?php

$eol = PHP_SAPI === 'cli' ? PHP_EOL : '<br>';

for ($i = 0; $i < 5; $i++) {
    echo $i, $eol;
}

echo $eol;

$rand = 0;
for ( ; $rand !== 3; ) {
    $rand = random_int(1, 5);
    echo $rand, $eol;

//    if ($rand === 3) {
//        break;
//    }
    sleep(1);
}

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


