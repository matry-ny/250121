<?php

namespace components;

class Storage
{
    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function set(string $key, mixed $value): self
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $parts = explode('.', $key);
        $data = $this->data;
        foreach ($parts as $part) {
            if (array_key_exists($part, $data)) {
                $data = $data[$part];
            } else {
                return $default;
            }
        }

        return $data;
    }
}