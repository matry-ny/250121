<?php

namespace models;

use RuntimeException;
use components\App;
use models\entities\UserEntity;

class User
{
    public const USER = 'user';

    private ?UserEntity $user;

    public function isGuest(): bool
    {
        return empty($this->user);
    }

    public function getUser(): UserEntity
    {
        return $this->user;
    }

    public function login(string $login, string $password): bool
    {
        $user = UserEntity::find($login, 'login');
        if (!$user || !$user->isValidPassword($password)) {
            throw new RuntimeException("Login or password is incorrect");
        }

        $this->user = $user;
        App::instance()->getSession()->set(self::USER, $this);

        return true;
    }
}
