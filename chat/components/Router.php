<?php

namespace components;

use Exception;
use helpers\StringsHelper;
use RuntimeException;

class Router
{
    private AbstractDispatcher $dispatcher;

    public function __construct(AbstractDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function init(): void
    {
        $controllerClass = $this->getControllerClass();
        try {
            $controller = new $controllerClass();
        } catch (Exception $exception) {
            throw new RuntimeException("Class {$controllerClass} is undefined", 404, $exception);
        }

        $actionMethod = $this->getActionMethod();
        if (!method_exists($controller, $actionMethod)) {
            throw new RuntimeException("Method {$actionMethod} is undefined for controller {$controllerClass}", 404);
        }

        $controller->{$actionMethod}();
    }

    private function getControllerClass(): string
    {
        $className = $this->dispatcher->getControllerPart();
        $className = StringsHelper::camelize($className);
        return "controllers\\{$className}Controller";
    }

    private function getActionMethod(): string
    {
        $actionName = $this->dispatcher->getActionPart();
        $actionName = StringsHelper::camelize($actionName);
        return "action{$actionName}";
    }
}
