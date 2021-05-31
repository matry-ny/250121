<?php

namespace App\Providers;

use App\Services\LiqPay;
use Illuminate\Support\ServiceProvider;

class LiqPayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('liqpay', function () {
            return new LiqPay();
        });
    }

    public function provides()
    {
        return ['liqpay'];
    }
}
