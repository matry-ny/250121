<?php

$programmingLanguages = [
    'PHP',
    'JS',
    'C++',
    'Java',
    'Go',
    'Kotlin',
];

asort($programmingLanguages);
arsort($programmingLanguages);
shuffle($programmingLanguages);

print_r($programmingLanguages);

$numbers = [
    '1110',
    '1',
    '116',
    '3',
    '66',
    '200',
    '43',
    '10',
    '11',
    '111',
    '8',
    '101',
];

asort($numbers);

print_r($numbers);

$students = [
    [
        'name' => 'Dmytro',
        'age' => 34,
    ],
    [
        'name' => 'Mykola',
        'age' => 22,
    ],
    [
        'name' => 'Hanna',
        'age' => 27,
    ],
    [
        'name' => 'Daria',
        'age' => 50,
    ],
    [
        'name' => 'Vasyl',
        'age' => 35,
    ],
];

uasort($students, static function (array $a, array $b) {
    return $a['age'] <=> $b['age'];
//    if ($a['age'] === $b['age']) {
//        return 0;
//    }
//
//    return $a['age'] < $b['age'] ? -1 : 1;
});

print_r($students);
