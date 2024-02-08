<?php

namespace App\Services\NbpApi;

use App\Services\IExchangeRateService;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class NbpExchangeRateService implements IExchangeRateService
{

    public function getAllExchangeRates(): Collection
    {
        $client = new Client();
        $request = $client->request('GET',
            "http://api.nbp.pl/api/exchangerates/tables/A", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);
        return collect(json_decode($request->getBody()->getContents())[0]->rates ?? []);
    }

    public function getExchangeRate($code): Collection
    {
        $client = new Client();
        $request = $client->request('GET',
            "http://api.nbp.pl/api/exchangerates/rates/A/$code", [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);
        return collect(json_decode($request->getBody()->getContents())->rates[0] ?? []);
    }
}
