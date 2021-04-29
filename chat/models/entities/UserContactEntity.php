<?php

namespace models\entities;

use components\db\ActiveRecord;

/**
 * Class UserEntity
 * @package models\entities
 *
 * @property int $id
 * @property string $type
 * @property string $contact
 * @property int $user_id
 */
class UserContactEntity extends ActiveRecord
{
    protected static function tableName(): string
    {
        return 'user_contacts';
    }
}
