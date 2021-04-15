<?php

namespace components;

interface PrintableInterface
{
    public function toString(): string;

    public function print(): void;
}
