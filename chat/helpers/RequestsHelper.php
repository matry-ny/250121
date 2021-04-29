<?php

namespace helpers;

class RequestsHelper
{
    public static function redirect(string $url, int $status = 301, bool $terminate = true): void
    {
        header("Location: {$url}", true, $status);
        if ($terminate) {
            exit;
        }
    }

    public static function isPost(): bool
    {
        return strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
    }
}
