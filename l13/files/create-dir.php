<?php

$directoryName = $_POST['directoryName'] ?? null;

if (!$directoryName) {
    exit('Directory name is required');
}

$rout = __DIR__ . '/storage/';

$userDir = $_POST['dir'] ?? '';
if ($userDir) {
    $rout .= "{$userDir}/";
}

$rout .= $directoryName;

if (is_dir($rout)) {
    $message = sprintf('Directory "%s" is already exists', $directoryName);
    exit($message);
}

$isDirCreated = mkdir($rout);
if (!$isDirCreated) {
    $message = sprintf('Directory "%s" was not created', $directoryName);
    exit($message);
}

header("Location: index.php?rout={$userDir}");
