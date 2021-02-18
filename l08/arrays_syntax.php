<?php

$programLanguagesOld = array(
    'PHP',
    'JS',
    'C++',
    'Java',
    'Go',
    'Kotlin',
);
$programLanguagesNew = [
    'PHP',
    'JS',
    'C++',
    'Java',
    'Go',
    'Kotlin',
    [
        'HTML',
        'XHTML',
        'CSS',
    ]
];

$programLanguagesNew[] = 'C#';
$programLanguagesNew[9] = 'Scala';
$programLanguagesNew[4] = 'HTML';
$programLanguagesNew[] = 'Python';

unset($programLanguagesNew[4], $programLanguagesNew[10]);

$student = [
    'name' => 'Vasyl',
    'age' => 22,
    'isGoodBoy' => true,
    'gender' => 'male',
    'programmingLanguages' => $programLanguagesNew
];
//$student[] = 'TEST';

unset($student['programmingLanguages'][6]);

print_r($student);
print_r($programLanguagesNew);

var_dump($student['name']);
echo "{$student['name']} ({$student['age']} years old), {$student['gender']}", PHP_EOL;

var_dump($student['programmingLanguages'][1]);
