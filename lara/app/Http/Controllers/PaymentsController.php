<?php

namespace App\Http\Controllers;

use App\Facades\LiqPayService;

class PaymentsController extends Controller
{
    public function liqpay()
    {
        $data = LiqPayService::status('123-33-22');
        var_dump($data);exit;
    }
}
