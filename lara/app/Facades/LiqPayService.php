<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LiqPayService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'liqpay';
    }
}
