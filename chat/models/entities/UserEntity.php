<?php

namespace models\entities;

use components\db\ActiveRecord;

/**
 * Class UserEntity
 * @package models\entities
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $login
 * @property string $password
 */
class UserEntity extends ActiveRecord
{
    protected static function tableName(): string
    {
        return 'users';
    }

    public function isValidPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}
