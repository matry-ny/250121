<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;

class RatesCollector extends Command
{
    private const NBU_URL = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json';

    protected $signature = 'rates:collect';
    protected $description = 'Collect rates from NBU';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', self::NBU_URL);
        $content = (string)$response->getBody();
        $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

        var_dump($data);
        exit;
    }
}
