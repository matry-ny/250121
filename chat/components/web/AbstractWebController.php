<?php

namespace components\web;

use components\App;
use helpers\RequestsHelper;

abstract class AbstractWebController
{
    protected function render(string $template, array $variables = [], ?string $layoutTemplate = null): string
    {
        return App::instance()->getView()->render($template, $variables, $layoutTemplate);
    }

    protected function redirect(string $url, int $status = 301, bool $terminate = true): void
    {
        RequestsHelper::redirect($url, $status, $terminate);
    }
}
