<?php

$storage = __DIR__ . '/storage/';
$userRout = $_GET['rout'];

$rout = "{$storage}{$userRout}";

if (is_file($rout)) {
    unlink($rout);
} else {
    // Todo: HW. Realize directory removing
    // to use rmdir
}

$returnRout = dirname($userRout);
header("Location: index.php?rout={$returnRout}");
