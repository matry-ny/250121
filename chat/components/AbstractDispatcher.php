<?php

namespace components;

abstract class AbstractDispatcher
{
    protected const DEFAULT_PART = 'index';

    protected string $controllerPart;
    protected string $actionPart;

    public function __construct()
    {
        $this->dispatch();
    }

    public function getControllerPart(): string
    {
        return $this->controllerPart;
    }

    public function getActionPart(): string
    {
        return $this->actionPart;
    }

    protected function prepareParts(string $request)
    {
        $parts = explode('/', trim($request, '/'));
        $parts = array_filter($parts);

        $this->controllerPart = $parts[0] ?? self::DEFAULT_PART;
        $this->actionPart = $parts[1] ?? self::DEFAULT_PART;
    }

    abstract protected function dispatch(): void;
}
