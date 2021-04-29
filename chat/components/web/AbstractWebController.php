<?php

namespace components\web;

use components\App;

abstract class AbstractWebController
{
    protected function render(string $template, array $variables = [], ?string $layoutTemplate = null): string
    {
        return App::instance()->getView()->render($template, $variables, $layoutTemplate);
    }
}
