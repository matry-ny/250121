<?php

namespace components\cli;

use components\AbstractDispatcher;

class CliDispatcher extends AbstractDispatcher
{
    protected function dispatch(): void
    {
        $address = $_SERVER['argv'][1] ?? '';
        $this->prepareParts($address);
    }
}
