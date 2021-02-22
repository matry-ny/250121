<?php

$eol = PHP_SAPI === 'cli' ? PHP_EOL : '<br>';

for ($col = 2; $col <= 9; $col++) {
    for ($row = 1; $row <= 10; $row++) {
        $result = $col * $row;
        echo "{$col} x {$row} = {$result}", $eol;
    }

    echo $eol;
}
