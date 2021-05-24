<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class UserEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property int $user_id
 * @property string $comment
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserEntity $author
 */
class CommentEntity extends Model
{
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'comment',
    ];

    public function author(): HasOne
    {
        return $this->hasOne(UserEntity::class, 'id', 'user_id');
    }
}
