<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserEntity
 * @package App\Models\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class UserEntity extends Model
{
    protected $table = 'users';
    public $timestamps = false;
}
