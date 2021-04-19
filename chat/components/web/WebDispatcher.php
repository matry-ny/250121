<?php

namespace components\web;

use components\AbstractDispatcher;

class WebDispatcher extends AbstractDispatcher
{
    protected function dispatch(): void
    {
        $address = $_SERVER['REQUEST_URI'];
        $this->prepareParts($address);
    }
}