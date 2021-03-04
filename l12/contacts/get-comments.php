<?php

$dir = __DIR__ . '/storage';

$files = scandir($dir);
$files = array_filter($files, function (string $file): bool {
    return !in_array($file, ['.', '..', '.gitignore']);
});

$storage = [];
foreach ($files as $file) {
    $jsonData = file_get_contents("{$dir}/{$file}");
    $data = json_decode($jsonData, true);

    $storage = array_merge($storage, $data);
}

return $storage;
