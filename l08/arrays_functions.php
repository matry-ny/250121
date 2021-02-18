<?php

$programLanguages = [
    'PHP',
    'JS',
    'C++',
    'Java',
    'Go',
    'Kotlin',
];

array_push($programLanguages, 'C#');
//$programLanguages[] = 'C#';

$php = array_shift($programLanguages);
$js = array_shift($programLanguages);
$cPlus = array_shift($programLanguages);

var_dump($php, $js, $cPlus);

array_unshift($programLanguages, $cPlus);
array_unshift($programLanguages, $js);
array_unshift($programLanguages, $php);

$other = [
    'HTML',
    'XHTML',
    'CSS',
    'XHTML',
    'CSS',
];

$allLanguages = array_merge($programLanguages, $other);

print_r($allLanguages);
var_dump(count($programLanguages));

$keys = [
    'name',
    'age',
    'gender',
];
$values = [
    'Dmytro',
    22,
    'male'
];
$data = array_combine($keys, $values);
print_r($data);

$student = [
    'name' => 'Vasyl',
    'age' => 22,
    'gender' => 'male',
];

print_r($student);
if (array_key_exists('name', $student)) {
    var_dump($student['name']);
} else {
    echo 'Key "name" is required', PHP_EOL;
}

print_r(array_unique($other));



