<?php

function game(int $number): bool
{
    return $number === random_int(1, 10);
}

while(true) {
    $number = readline('Enter your number: ');
    echo game($number) ? 'Winner' : 'Looser';
    echo PHP_EOL;

    $continue = readline('Play again (yes/no): ');
    if ($continue !== 'yes') {
        echo 'Bye', PHP_EOL;
        break;
    }
}

