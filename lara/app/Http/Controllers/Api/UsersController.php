<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entities\UserEntity;

class UsersController extends Controller
{
    public function all()
    {
        return UserEntity::all();
    }
}
