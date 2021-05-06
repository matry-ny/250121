<?php

namespace components\web;

use helpers\ArraysHelper;

class Sessions
{
    private const FLASH_KEY = 'flash';
    private const STORAGE_KEY = 'storage';

    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
    }

    public function set(string $key, mixed $value): self
    {
        $_SESSION[self::STORAGE_KEY][$key] = $value;
        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return ArraysHelper::find($_SESSION[self::STORAGE_KEY] ?? [], $key, $default);
    }

    public function setFlash(string $key, mixed $value): self
    {
        $_SESSION[self::FLASH_KEY][$key] = $value;
        return $this;
    }

    public function addFlash(string $key, mixed $value): self
    {
        if (!isset($_SESSION[self::FLASH_KEY][$key])) {
            $_SESSION[self::FLASH_KEY][$key] = [];
        }

        $_SESSION[self::FLASH_KEY][$key][] = $value;
        return $this;
    }

    public function getFlash(string $key, mixed $default = null): mixed
    {
        $data = ArraysHelper::find($_SESSION[self::FLASH_KEY] ?? [], $key, $default);
        if ($data) {
            unset($_SESSION[self::FLASH_KEY][$key]);
        }

        return $data;
    }

    public function destroy(): void
    {
        session_destroy();
    }
}