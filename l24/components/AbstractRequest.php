<?php

namespace components;

abstract class AbstractRequest
{
    abstract public function parse(): void;
}
