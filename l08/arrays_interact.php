<?php

$data = [];

$data['name'] = readline('Enter your name: ');
$data['age'] = readline('Enter your age: ');
$data['gender'] = readline('Enter your gender: ');
$data['programLanguages'][] = readline('Enter some programming language: ');
$data['programLanguages'][] = readline('Enter some programming language: ');
$data['programLanguages'][] = readline('Enter some programming language: ');

print_r($data);
