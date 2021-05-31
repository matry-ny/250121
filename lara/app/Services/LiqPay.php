<?php

namespace App\Services;

use LiqPay as AbstractLiqPay;
use stdClass;

class LiqPay
{
    protected AbstractLiqPay $client;

    public function __construct()
    {
        $this->client = new AbstractLiqPay(config('liqpay.public_key'), config('liqpay.private_key'));
    }

    public function pay(
        float $amount = 1.00,
        string $currency = 'UAH',
        string $description = 'foo',
        string $orderId = 'bar',
        string $resultUrl = '',
        string $serverUrl = '',
        bool $autoRedirect = false
    ): string {
        $form = $this->client->cnb_form([
            'action' => 'pay',
            'amount' => $amount,
            'currency' => $currency,
            'description' => $description,
            'order_id' => $orderId,
            'version' => '3',
            'result_url' => $resultUrl,
            'server_url' => $serverUrl,
        ]);

        if ($autoRedirect) {
            $script = <<<HTML
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"
                        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                        crossorigin="anonymous"></script>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $("form").submit();
                    });
                </script>
            HTML;
            $form .= $script;
        }

        return $form;
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function status(string $orderId): stdClass
    {
        return $this->client->api('request', [
            'action' => 'status',
            'version' => '3',
            'order_id' => $orderId
        ]);
    }
}
