<?php

namespace models\entities;

use components\db\ActiveRecord;

/**
 * Class UserEntity
 * @package models\entities
 *
 * @property int $id
 * @property int $user_id
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 */
class CommentEntity extends ActiveRecord
{
    protected static function tableName(): string
    {
        return 'comments';
    }
}
