<?php

namespace components\web;

use components\AbstractRequest;
use components\PrintableInterface;
use components\TestableInterface;

class Request extends AbstractRequest implements PrintableInterface, TestableInterface
{
    public function parse(): void
    {
        var_dump($_GET, $_POST);
    }

    public function toString(): string
    {
        return json_encode(array_merge($_GET, $_POST));
    }

    public function print(): void
    {
        echo $this->toString();
    }

    public function varDump(): void
    {
        var_dump(123);
    }
}
