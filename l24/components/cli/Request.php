<?php

namespace components\cli;

use components\AbstractRequest;
use components\PrintableInterface;

class Request extends AbstractRequest implements PrintableInterface
{
    public function parse(): void
    {
        var_dump(getopt('t:q:'));
    }

    public function toString(): string
    {
        return json_encode(getopt('t:q:'));
    }

    public function print(): void
    {
        echo $this->toString(), PHP_EOL;
    }
}
