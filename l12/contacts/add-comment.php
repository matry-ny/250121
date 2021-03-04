<?php

$file = __DIR__ . '/storage/' . date('Y-m-d') . '.json';

// Read data begin
$jsonData = file_get_contents($file);
$storage = json_decode($jsonData, true);
// Read data end

// Write data begin
$data = $_POST;
$data['time'] = time();

$storage[] = $data;

$jsonData = json_encode($storage);

file_put_contents($file, $jsonData);
// Write data end

header('Location: index.php');
