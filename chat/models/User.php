<?php

namespace models;

class User
{
    private bool $isGuest = true;

    public function isGuest(): bool
    {
        return $this->isGuest;
    }

    public function setIsGuest(bool $isGuest): void
    {
        $this->isGuest = $isGuest;
    }
}
